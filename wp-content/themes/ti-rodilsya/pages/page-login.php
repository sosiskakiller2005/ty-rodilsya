<?php
/*
Template Name: Шаблон страницы входа
*/
?>
<section class="section-login">
    <form class="login-form">
        <h2>Вход</h2>
        <p>Авторизуйтесь через социальные сети</p>
        <div class="login-socials">
            <?php echo do_shortcode('[miniorange_social_login shape="square" theme="default" space="4" size="35"]'); ?>
            <div>
  <script src="https://unpkg.com/@vkid/sdk@<3.0.0/dist-sdk/umd/index.js"></script>
  <script type="text/javascript">
    if ('VKIDSDK' in window) {
      const VKID = window.VKIDSDK;

      VKID.Config.init({
        app: 52957066,
        redirectUrl: 'https://tyrodilsyatest.ru/openidcallback/vkontakte',
        responseMode: VKID.ConfigResponseMode.Callback,
        source: VKID.ConfigSource.LOWCODE,
        scope: '', // Заполните нужными доступами по необходимости
      });

      const oneTap = new VKID.OneTap();

      oneTap.render({
        container: document.currentScript.parentElement,
        showAlternativeLogin: true
      })
      .on(VKID.WidgetEvents.ERROR, vkidOnError)
      .on(VKID.OneTapInternalEvents.LOGIN_SUCCESS, function (payload) {
        const code = payload.code;
        const deviceId = payload.device_id;

        VKID.Auth.exchangeCode(code, deviceId)
          .then(vkidOnSuccess)
          .catch(vkidOnError);
      });
    
      function vkidOnSuccess(data) {
        // Обработка полученного результата
      }
    
      function vkidOnError(error) {
        // Обработка ошибки
      }
    }
  </script>
</div>
            <a class="social-link" href="#">
                <i class="fa-brands fa-odnoklassniki-square"></i>
            </a>
            <a class="social-link" href="#">
                <i class="fa-brands fa-vk"></i>
            </a>
        </div>

        <p>или используйте свой аккаут</p>
        <input type="text" name="" id="" placeholder="Введите почту">
        <input type="password" name="" id="" placeholder="Введите пароль">
        <a href="#">Забыли пароль?</a>
        <button>Войти</button>
    </form>

</div>

</section>
</div>