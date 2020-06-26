<p class="site-logo-login">Find!<span>アクティブラーナー</span></p>
<section class="login">
  <div class="inner cf login-wrap">
    <div class="login_title">コンテンツをご利用の先生はこちら<span class="is-pc">からログイン</span></div>
    <div class="form-login{% if not fileName %} only{% endif %}">
      <form action="{{url_for('member_login')}}" method="post">
        <div>
          <label for="email">メールアドレス</label>
          <input class="form-control form-search" type="text" name="{{form.getName()}}[mail_address]" id="email">
        </div>
        <div>
          <label for="password">パスワード</label>
          <input class="form-control form-search" type="password" name="{{form.getName()}}[password]" id="password">
        </div>
        <p class="checkbox-login">
          <input type="checkbox" id="checked" checked="checked" name="{{form.getName()}}[is_remember_me]" />
          <label for="checked">次回から自動的にログインする</label>
        </p>
        <button type="submit" class="btn btn-style btn-sm btn-block">ログイン</button>
        <span class="note-arrow">{{link_to('ログイン出来ない方はこちら', '@scAuthMailAddress_passwordReminder')|raw}}</span> {{form.renderHiddenFields()|raw}}
      </form>
    </div>
    <div id="system_teachers">
      <div class="login_title">システム管理者の先生へ</div>
      <div class="system_teachers_wrapper">
        <p>利用者の登録や削除など<br>
          システム管理者の方の操作はこちら</p>
        <a href="https://school-fal.com/backend.php/">ログインページへ</a> </div>
    </div>
  </div>
</section>
<style>
#member-login .wrapper .main-wrap .login-wrap{
  flex-direction: column;
}
.login_title {
    color: #fff;
    background: #34b7b9;
    font-size: 17px;
    text-align: center;
    padding: 5px;
    margin: 0 auto 0;
    width: 65%;
}
@media(max-width:1024px){
  .login_title{
    width: 100%;
  }
}
#system_teachers{
  width:280px;
  position: absolute;
  right:1%; top:3%;
}
@media(max-width:1024px){
  #system_teachers{
    position:static;
    width:100%;
    margin-top:45px;
  }
}
.system_teachers_wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    text-align: center;
    flex-direction: column;
    padding: 10px 10px 10px;
    border: 2px solid #1572db;
    background: #fff;
    color: #000;
}

#system_teachers .login_title{
  background:#1572db;
  width: 100%;
}
.system_teachers_wrapper p{
  font-size:15px;
}
.system_teachers_wrapper a{
  display:flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  text-align: center;
  margin-top:15px;
  background:#1572db;
  width: 100%;
  border-radius: 5px;
  padding: 10px;
  color: #fff;
}
</style>
