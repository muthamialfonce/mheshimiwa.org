@extends('layouts.gentella')
@section('title')
    My Account
@endsection
@section('content')
<style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }

</style>
@if($user->profileCompletion()<95)
<div class="" style="height: 100px !important;width: 150px !important;">
    @include('account.meter')
</div>
<div>
    Your profile score is {{ $user->profileCompletion() }}%<br/>
    Here are some ideas that will help you enhance your profile   <a href="#profile_state_modal" data-toggle="modal" class="btn btn-info btn-ms">Show Me!</a>
</div>
@endif
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Political Position Details</div>
            <div class="panel-body">
                <table class="table table-condensed table-bordered table-striped table-hover">
                    <tr>
                        <td colspan="2">
                            @if(Auth::user()->image)
                                <img height="200px;" class="profile_image" src="{{ URL::to(Auth::user()->image) }}">
                                <a href="#photo_modal" style="float:left" class="btn btn-default" data-toggle="modal">Change Photo</a>
                            @else
                                <a href="#photo_modal" class="btn btn-info" data-toggle="modal">Add Photo</a>
                            @endif
                        </td>
                    </tr>
                </table>

                <table class="table table-condensed table-bordered table-striped table-hover">
                    <?php
                    $politic = $user->getInterestedSeat();
                    $party = \App\PoliticalParty::find($politic->political_party_id);
                    $seat = \App\PoliticalSeat::find($politic->political_seat_id);
                  ?>

                    <tr>
                        <th colspan="2" style="text-align:center; font-weight:bold; font-size:16px">Political Position Details <a href="{{ URL::to('user/aspiring_position') }}" class="btn btn-success btn-xs"  style="float:right"><i class="fa fa-edit"></i> Edit</a></th>
                    </tr>
                    <tr>
                        <th style="text-align:left; font-weight:bold">Vying For</th>
                        <td style="text-align:center; font-weight:bold">{{ $seat->name}}</td>
                    </tr>
                        <tr>
                        <th style="text-align:left; font-weight:bold">Party</th>
                        <td style="text-align:center; font-weight:bold">{{ $party->name.'('.$party->abbreviation.')' }}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left; font-weight:bold">Tagline</th>
                        <td style="text-align:center; font-weight:bold">@foreach($politics as $politic)
                            {{$politic->comments}}
                           @endforeach
                        </td>
                    </tr>

                </table>
                <table class="table table-condensed table-bordered table-striped table-hover">
                    <tr>
                        <th colspan="2" style="text-align:center; font-weight:bold; font-size:16px">Political Location Details <a href="{{ URL::to('user/complete_profile') }}" class="btn btn-success btn-xs" style="float:right"><i class="fa fa-edit"></i> Edit</a></th>
                    </tr>
                        <tr>
                            <th style="text-align:left; font-weight:bold">County</th>
                            <td style="text-align:center; font-weight:bold">{{ $user->profile->county->name }}</td>
                        </tr>
                    <tr>
                        <th style="text-align:left; font-weight:bold">Constituency</th>
                        <td style="text-align:center; font-weight:bold">{{ $user->profile->constituency->name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left; font-weight:bold">Ward</th>
                        <td style="text-align:center; font-weight:bold">{{ $user->profile->ward->name }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Social Media Profile</div>
            <div class="panel-body">
                <table class="table table-condensed table-striped table-bordered table-hover">
                    <tr>
                        <th>Website</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td style="color:darkblue">
                            <a target="_blank" href="{{ $user->facebook()->url ? $user->facebook()->url:"#" }}"> <i class="fa fa-facebook fa-2x"></i> </a>
                            <small>Facebook</small>
                        </td>
                        <td>{{ $user->facebook()->username }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" onclick="return addSocial('{{ $user->facebook() }}','facebook');"><i class="fa fa-plus"></i>Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#93C5D6;">
                           <a target="_blank" href="{{ $user->twitter()->url ? $user->twitter()->url:"#" }}"> <i class="fa fa-twitter fa-2x"></i></a>
                            <small>Twitter</small>
                        </td>
                        <td>
                            {{ $user->twitter()->username }}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-xs" onclick="return addSocial('{{ $user->twitter() }}','twitter');"><i class="fa fa-plus"></i>Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:darkblue">
                            <a target="_blank" href="{{ $user->linkedIn()->url ? $user->linkedIn()->url:"#" }}">  <i class="fa fa-linkedin fa-2x"></i></a>
                            <small>LinkedIn</small>
                        </td>
                        <td>{{ $user->linkedIn()->username }}</td>
                        <td>
                                <a class="btn btn-primary btn-xs" onclick="return addSocial('{{ $user->linkedIn() }}','linkedin');"><i class="fa fa-plus"></i>Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="color:darkblue">
                            <a target="_blank" href="{{ $user->website()->url ? $user->website()->url:"#" }}">  <i class="fa fa-globe fa-2x"></i></a>
                            <small>Personal Website</small>
                        </td>
                        <td>{{ $user->website()->username }}</td>
                        <td>
                                <a class="btn btn-primary btn-xs" onclick="return addSocial('{{ $user->website() }}','website');"><i class="fa fa-plus"></i>Update</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                Leadership History
            </div>
            <div class="panel-body">
                <a class="btn btn-default" onclick="return newHistory()" style="float:right"><i class="fa fa-plus"></i> Add Leadership</a>
                <br/>
                <table class="table table-stripped table-condensed table-hover">
                    <tr>
                        <th>#</th>
                        <th>Year</th>
                        <th>Party</th>
                        <th>Position</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                    @foreach($histories as $history)
                        <?php
                        $party = \App\PoliticalParty::find($history->political_party_id);
                        $seat = \App\PoliticalSeat::find($history->political_seat_id);
                                ?>
                        <tr>
                            <td>{{ $history->id }}</td>
                            <td>{{ $history->year.'-'.$history->ended }}</td>
                            <td>{{ $party->name }}</td>
                            <td>{{ $seat->name }}</td>
                            <td>{{ $history->comments }}</td>
                            <td>
                                <a onclick="return editHistory('{{ $history->id }}','{{ $history->political_party_id }}','{{ $history->political_seat_id }}','{{ $history->year }}','{{ $history->ended }}','{{ strip_tags($history->comments) }}');" class="btn btn-primary btn-xs" href="#"><i class="fa fa-edit"></i> Edit</a><a onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs" href="{{ URL::to("account/history/delete/$history->id") }}"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                {{ $histories->links() }}
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="history_modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <a class="btn btn-danger pull-right" data-dismiss="modal">&times;</a>
                Political History Form
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ URL::to("account/add_history") }}">
                   {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="control-label col-md-3">Party</label>
                        <div class="col-md-6">
                            <select required name="political_party_id" class="form-control">
                                <option value="">Select..</option>
                                @foreach($parties as $party)
                                    <option value="{{ $party->id }}">{{ $party->name }}</option>
                                    @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Position</label>
                        <div class="col-md-6">
                            <select required name="political_seat_id" class="form-control">
                                <option value="">Select..</option>
                                @foreach($seats as $seat)
                                    <option value="{{ $seat->id }}">{{ $seat->name }}</option>
                                    @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">From (Year)</label>
                        <div class="col-md-6">
                            <select onchange="return setTo();" name="from" required class="form-control">
                                <option value="">Select..</option>
                                @for($i=1970;$i<=date('Y');$i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">To (Year)</label>
                        <div class="col-md-6">
                            <select name="to" required class="form-control">
                                <option value="">Select..</option>
                                @for($i=1970;$i<=date('Y');$i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Comments</label>
                        <div class="col-md-6">
                            <textarea name="comments" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">&nbsp;</label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
   <div class="modal fade" id="photo_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Change Profile Picture
                    <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to("account/profile_image") }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="file" name="image" required class="form-control">
                                <br/>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-fade" id="social_media_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                    <span class="website_info"></span> Profile Info
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ URL::to('account/social_media') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="website">
                        <div class="form-group">
                            <label class="col-md-3 control-label"><span class="website_info"></span> Username</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><span class="website_info"></span> Profile Url</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function setTo(){
            var selected = $("select[name='from']").val();
            var max = "{{ date('Y') }}";
            max = parseInt(max);
            selected = parseInt(selected);
            $("select[name='to']").html('');
            $("select[name='to']").append('<option value="">Select</option>');
            console.log(selected,max);
            for(i=selected;i<=max;i++){
                $("select[name='to']").append('<option value="'+i+'">'+i+'</option>');
            }
        }
        function newHistory(){
            $("input[name='id']").val('');
            $("input[name='to']").val('');
            $("input[name='from']").val('');
            $("select[name='political_seat_id']").val('');
            $("select[name='political_party_id']").val('');
            $("textarea[name='comments']").val('');
            $("#history_modal").modal('show');
            return false;
        }

        function editHistory(id,pol_id,seat_id,from,to,comments){
            $("input[name='id']").val(id);
            $("input[name='to']").val(to);
            $("input[name='from']").val(from);
            $("select[name='political_seat_id']").val(seat_id);
            $("select[name='political_party_id']").val(pol_id);
            $("textarea[name='comments']").val(comments);
            $("#history_modal").modal('show');
            return false;
        }

        function addSocial(details,website){
            social = JSON.parse(details);
            $("input[name='website']").val(website);
            $(".website_info").text(website);
            $("input[name='username']").val(social.username);
            $("input[name='url']").val(social.url);
            $("#social_media_modal").modal('show');
            return false;
        }
    </script>
@endsection

<div class="modal fade" role="dialog" id="profile_state_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <a class="btn btn-danger pull-right" data-dismiss="modal">&times;</a>
                    <h4>Profile Completion Help</h4>
                </div>
            </div>
            <div class="modal-body">
                You profile score is {{ $user->profileCompletion() }}% complete but you can improve it. Please check on the following questions<br/>

                <ul>
                    @if(count($user->getMissingEducations())>0)
                        <li>Where did you attend your <strong>{{ $user->getMissingEducations()[0]->name }}</strong> education? <a class="btn btn-success btn-xs" href="{{ URL::to("education?level_id=".$user->getMissingEducations()[0]->id."#educationlevel_form_modal") }}">+5 Now</a> </li>
                    @endif
                    @if($user->getMissingAchievements())
                        <li>What have you <strong>achieved/done</strong> for the people? <a class="btn btn-success btn-xs" href="{{ URL::to("achievement#achievement_form_modal") }}">+{{ $user->getMissingAchievements() }} Now</a></li>
                     @endif
                    @if($user->getMissingAgendas())
                        <li>What are your <strong>Plans/Agendas</strong> for your people? <a class="btn btn-success btn-xs" href="{{ URL::to("agendas#agenda_form_modal") }}">+{{ $user->getMissingAgendas() }} Now</a></li>
                    @endif
                        @if($user->getMissingExperiences())
                        <li>What are your <strong>work experiences</strong>? <a class="btn btn-success btn-xs" href="{{ URL::to("experiences#experience_form_modal") }}">+{{ $user->getMissingExperiences() }} Now</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
