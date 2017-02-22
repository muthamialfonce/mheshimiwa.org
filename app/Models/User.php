<?php

namespace App;

use App\Profile;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Symfony\Component\HttpFoundation\Request;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use SoftDeletes;
    // use Billable;
    protected $dates=['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','gender','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function configurations(){
        return $this->hasMany(Configuration::class);
    }

    public function profile()
     {
        return $this->hasOne(Profile::class);
      }

    public function pages(){
        return $this->hasMany(Page::class);
    }

        /**
     * Get all of the regions for the user.
     */
    public function regions(){
        return $this->hasMany(Region::class);
    }

      /**
     * Get all of the counties for the user.
     */
      public function counties(){
        return $this->hasMany(County::class);
      }

        /**
     * Get all of the constituencies for the user.
     */
        public function constituencies(){
            return $this->hasMany(Constituency::class);
        }

          /**
     * Get all of the wards for the user.
     */
          public function wards(){
            return $this->hasMany(Ward::class);
          }

          public function educationLevels(){
            return $this->hasMany(EducationLevel::class);
          }

          public function achievements(){
            return $this->hasMany(Achievement::class);
          }

          public function experiences()
          {
            return $this->hasMany(Experience::class);
          }

          public function academiclevels()
          {
            return $this->hasMany(AcademicLevel::class);
          }

    public function politics(){
        return $this->hasMany(Politic::class);
    }
    public function politicalParties(){
        return $this->hasMany(PoliticalParty::class);
    }
    public function politicalLevels(){
        return $this->hasMany(PoliticalLevel::class);
    }
    public function politicalSeats()
    {
        return $this->hasMany(PoliticalSeat::class);
    }

    public function getInterestedSeat(){
        $politic = Politic::where([
            ['user_id','=',$this->id],
            ['status','=',0]
        ])->first();
        return $politic;
    }
    public function politicalEvents(){
        return $this->hasMany(PoliticalEvent::class);
    }
    public function agendas(){
        return $this->hasMany(Agenda::class);
    }

    public function twitter(){
        $twitter = Social::where([
            ['website','like','twitter'],
            ['user_id','=',$this->id]
        ])->first();
        if(!$twitter){
            $twitter = new Social();
        }
        return $twitter;
    }
    public function facebook(){
        $fb = Social::where([
            ['website','like','facebook'],
            ['user_id','=',$this->id]
        ])->first();
        if(!$fb){
            $fb = new Social();
        }
        return $fb;
    }
    public function linkedIn(){
        $linkedin = Social::where([
            ['website','like','linkedin'],
            ['user_id','=',$this->id]
        ])->first();
        if(!$linkedin){
            $linkedin = new Social();
        }
        return $linkedin;
    }

    function socials(){
        return $this->hasMany(Social::class);
    }

    public function profileComments(){
        return $this->hasMany(ProfileComment::class);
    }

    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function mpesaPayments(){
        return $this->hasMany(MpesaPayment::class,'sender_phone','phone');
    }

    public function mpesaDonations(){
        return $this->hasMany(MpesaDonation::class);
    }

    public function paypalPayments(){
        return $this->hasMany(PaypalPayment::class);
    }

    public function paypalDonations(){
        return $this->hasMany(PaypalDonation::class);
    }

    public function balance(){
        $user = User::find($this->id);
        $mpesa_payments = $user->mpesaPayments()->sum('amount');
        $paypal_payments = 0;
        foreach($user->paypalPayments as $p_pay){
            $ksh = $p_pay->amount*$p_pay->rate;
            $paypal_payments+=$ksh;
        }
        $amount_to_pay = 0;
        $aspiring_politic = $user->getInterestedSeat();
        if($aspiring_politic){
            $amount_to_pay = (int)@$aspiring_politic->seat->rate->amount;
        }

        $total_paid = $mpesa_payments+$paypal_payments;
        if($total_paid<$amount_to_pay){
            $remaining = $amount_to_pay-$total_paid;
        }else{
            $remaining = 0;
        }
        return round($remaining,0);
    }

    public function totalDonations(){
        $paypal = User::find($this->id)->paypalDonations()
            ->selectRaw('SUM(amount * rate) as total')
            ->pluck('total');
       if(count($paypal)>0){
           $pp_amount = round($paypal[0],0);
       }else{
           $pp_amount = 0;
       }
//        dd($pp_amount);

        $mpesa = User::find($this->id)->mpesaDonations()->sum('amount');
        $total = $pp_amount+$mpesa;
        return $total;
    }

    public function donationFee(){
        $charge = Configuration::where([
            ['slug','like','donation_fee']
        ])->first();
        if(isset($charge)){
            if($charge->inc_type=='percentage'){
                $percent = $charge->amount;
                $fee = $this->totalDonations()*($percent/100);
            }else{
                $fee = $charge->amount;
            }
        }else{
            die('error resolving donation fee');
        }
        return $fee;
    }

    public function withdrawnAmount(){
        $withdrawals = User::find($this->id)->withdrawalRequests()->sum('amount');
        $total = $withdrawals;
        return $total;
    }

    public function profileCompletion(){
        $user = User::find($this->id);
        $default = 20;
        $education_scored = $user->educationLevels->count()*5;
        if($education_scored>20){
            $education_scored = 20;
        }

        $agenda_score = $user->agendas->count()*5;
        if($agenda_score>20){
            $agenda_score = 20;
        }

        $work_score = $user->experiences->count()*10;
        if($work_score>20){
            $work_score = 20;
        }

        $achievement_score = $user->achievements->count()*10;
        if($achievement_score>20){
            $achievement_score = 20;
        }
        $total = $default+$agenda_score+$education_scored+$work_score+$achievement_score;
        return $total;
    }

    public function getMissingEducations(){
        $user = User::find($this->id);
       $has = $user->educationLevels()->pluck('academic_level_id')->toArray();
        $missing = AcademicLevel::whereNotIn('id',$has)->get();
        return $missing;
    }

    public function getMissingAchievements(){
        $user = User::find($this->id);
        $achievement_score = count($user->achievements)*10;
        if($achievement_score>20){
            $achievement_score = 20;
        }
        return 20-$achievement_score;
    }

    public function getMissingAgendas(){
        $user = User::find($this->id);
        $agenda_score = $user->agendas->count()*5;
        if($agenda_score>20){
            $agenda_score = 20;
        }
        return 20-$agenda_score;
    }

    public function getMissingExperiences(){
        $user = User::find($this->id);
        $work_score = $user->experiences->count()*10;
        if($work_score>20){
            $work_score = 20;
        }
        return 20-$work_score;
    }

    public function withdrawalRequests(){
        return $this->hasMany(WithrawalRequest::class);
    }

    public function portfolio(){
        return $this->hasMany(Portfolio::class);
    }

    public function website(){
        $website = Social::where([
            ['website','like','website'],
            ['user_id','=',$this->id]
        ])->first();
        if(!$website){
            $website = new Social();
        }
        return $website;
    }
}
