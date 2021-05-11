    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Login</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="/ajax/login" id="loginForm" novalidate method="post">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="Username" title="Please enter you username" required name="username" id="username" class="form-control">
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control">
                            <span class="help-block small">Your strong password</span>
                        </div>
                        <div>
                            <button class="btn btn-primary">Login</button>
                            <a class="btn btn-warning" href="/myhq/register">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
