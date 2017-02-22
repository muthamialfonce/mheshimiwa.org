<div id="popup" style="font-size:large;font-weight: bold;" class="alert alert-warning">
    Hello <span style="color:greenyellow">{{ Auth::user()->name }}</span>,<br/>
    Your account has not yet been approved.<a href="#disaproved_reason" class="badge" data-toggle="modal">Why <i class="fa fa-question"></i></a><br/>
    Please contact admin for more.
</div>
<div class="modal fade" role="dialog" id="disaproved_reason">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="btn btn-danger pull-right" data-dismiss="modal">&times;</a>
                Reasons for an account being inactive/unapproved
            </div>
            <div class="modal-body">
                <ol>
                    <li>Admin is still reviewing your personal details to avoid impersonation</li>
                    <li>Your account has been suspected not to be genuine</li>
                    <li>Your account has been suspected to be used in malicious practices</li>
                </ol>
                <div>
                    To be sure, please contact<br/>
                    <i class="fa fa-envelope"></i>&nbsp;{{ env('ADMIN_EMAIL','info@mheshimiwa.co.ke') }}<br/>
                    <i class="fa fa-phone"></i>&nbsp;{{ env('ADMIN_PHONE',' +254729737256') }}<br/>
                </div>
            </div>
        </div>
    </div>
</div>