@error('login')
<div class="box error-box">
    {{ $message }}
</div>
@enderror
@error('password')
<div class="box error-box">
    {{ $message }}
</div>
@enderror
<div id="content-page" class="content group">
    <div class="hentry group">
        <form class="contact-form" method="post" action="{{ route($routeName) }}" enctype="multipart/form-data">
            <div class="usermessagea"></div>
            <fieldset>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Login</span>
                            <br />					<span class="sublabel">This is the login</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="login"  class="required" />
                        </div>
                        <div class="msg-error">
                        </div>
                    </li>
                    <li class="text-field">
                        <label for="email-contact-us">
                            <span class="label">Password</span>
                            <br />					<span class="sublabel">This is a field password</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-signin"></i></span><input type="password" name="password"  class="required"/></div>
                        <div class="msg-error">
                        </div>
                    </li>
                    <li class="submit-button">
                        @csrf
                        <input type="submit" name="yit_sendmail" value="login" class="sendmail alignright" />
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</div>
