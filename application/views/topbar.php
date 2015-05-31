
<div id="registermodal" class="reveal-modal large-6" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  

<form>
  <div class="row">
    <div class="large-12 columns">
      <h3 id="modalTitle">Register</h3>
      <p>Register to Syrin and become a member of Guild Name! All fields required.</p>
        <input type="text" class="modal-input" placeholder="Username" />
        <input type="text" class="modal-input" placeholder="E-mail" />
        <input type="text" class="modal-input" placeholder="Password" />
        <input type="text" class="modal-input" placeholder="Confirm Password" />
        <input type="submit" value="Register" class="button large-12" \>
    </div>
  </div>  
</form>

  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="loginmodal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<form>
  <div class="row">
    <div class="large-12 columns">
      <h3 id="modalTitle">Log In</h3>
        <input type="text" class="modal-input" placeholder="Username" />
        <input type="text" class="modal-input" placeholder="Password" />
        <a href="#">Forgot Password?</a>
        <br /><br />
        <input type="submit" value="Log In" class="button large-12" \>
    </div>
  </div>  
</form>

  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


    <nav class="top-bar" data-topbar>
        <ul class="title-area">
             
            <li class="name">
                <h1>
                    <a href="#">
                        Top Bar Title
                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
 
        <section class="top-bar-section">
             
            <ul class="right">
                <li class="divider"></li>
                <li><a href="#" data-reveal-id="registermodal">Register</a></li>
                <li class="divider"></li>
                <li><a href="#" data-reveal-id="loginmodal">Log In</a></li>
            </ul>
        </section>
    </nav>
