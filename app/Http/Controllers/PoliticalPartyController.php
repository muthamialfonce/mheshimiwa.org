<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\PoliticalParty;

use Auth;

use DB;

use App\Repositories\RoleRepository;

class PoliticalPartyController extends Controller
{
    protected $folder = "political_parties.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

   public function index(){
            if (isset($_GET['search'])) {

          $search = \Request::get('search'); //<-- we use global request to get the param of URI

    $parties = PoliticalParty::where('name','like','%'.$search.'%')
                               ->orwhere('id','like','%'.$search.'%')
                               ->orwhere('abbreviation','like','%'.$search.'%')
                               ->orderBy('name','asc')->paginate(10);

     return view($this->folder.'index',[
            'parties'=>$parties
        ]);
       }
       else{
             $parties = PoliticalParty::orderBy('name','asc')->paginate(10);

        return view($this->folder.'index',[
            'parties'=>$parties
        ]);
    }

    }

    public function store(Request $request){
        $this->user->politicalParties()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'about'=>$request->about,
            'abbreviation'=>$request->abbreviation,
            'slogan'=>$request->slogan,
            'year_founded'=>$request->year_founded,
        ]);
        return redirect("parties")->with('notice',['class'=>'success','message'=>' saved']);
    }

    public function delete(PoliticalParty $party){
        $party->delete();
        return redirect("parties")->with('notice',['class'=>'success','message'=>'Level Deleted']);
    }

    public function partyForm($politicalParty=null){
        $politicalParty = PoliticalParty::findOrNew($politicalParty);
        return view($this->folder.'add',[
            'party'=>$politicalParty
        ]);
    }

    public function viewParty($politicalParty){
        $politicalParty = PoliticalParty::findOrFail($politicalParty);
//        $manifestos = $politicalParty->manifestos()->orderBy('id','desc')->paginate(10);
        return view($this->folder.'party_view',[
            'party'=>$politicalParty,
//            'manifestos'=>$manifestos
        ]);

    }

    public function addManifesto($party_id,Request $request){
        $this->user->partyManifestos()->updateOrCreate(['id'=>$request->id],[
            'political_party_id'=>$party_id,
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect("parties/view/$party_id")->with('notice',['class'=>'info','message'=>'Manifesto Saved!']);
    }

    public function deleteManifesto($party_id,$manifesto_id){
        $politicalParty = PoliticalParty::findOrFail($party_id);
        $manifesto= $politicalParty->manifestos()->where([
            ['id','=',$manifesto_id]
        ])->first();
        $manifesto->delete();
        return redirect("parties/view/$party_id")->with('notice',['class'=>'info','message'=>'Manifesto removed!']);

    }

    public function import(Request $request){
        $file_uploaded = $request->file('file');
        $real_path = $file_uploaded->getRealPath();
        $ext_arr  = explode('.',$file_uploaded->getClientOriginalName());
        $extension = $ext_arr[count($ext_arr)-1];
        if($extension != 'csv'){
            return redirect("parties")->with('notice',['class'=>'danger','message'=>'invalid file']);
        }else{
            $file = fopen($real_path,'r');
            $no = 0;
            $updated = 0;
            $created = 0;
            while($row = fgetcsv($file)){
                if($no != 0 && $row[0] != ''){
                    $abbrev = $row[0];
                    $name = $row[1];
                    $party = PoliticalParty::where([
                        ['abbreviation','like',$abbrev]
                    ])->first();

                    if($party){
                        $updated++;
                        $party->name = $name;
                        $party->update();
                    }else{
                        $created++;
                        $this->user->politicalParties()->create([
                           'abbreviation'=>$abbrev,
                            'name'=>$name
                        ]);
                    }
                }
                $no++;
            }
            return redirect("parties")->with('notice',['class'=>'success','message'=>"$created Parties created $updated Updated"]);
        }
    }
}
