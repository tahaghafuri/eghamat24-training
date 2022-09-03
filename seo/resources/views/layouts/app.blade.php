<!DOCTYPE html>
<html style="font-size: 16px;" lang="fa" dir="rtl"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/nicepage.css" media="screen">
    <style>
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Thin.woff2') format('woff2');
            font-weight: 100;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-ExtraLight.woff2') format('woff2');
            font-weight: 200;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Light.woff2') format('woff2');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Regular.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Medium.woff2') format('woff2');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-SemiBold.woff2') format('woff2');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-ExtraBold.woff2') format('woff2');
            font-weight: 800;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: Vazirmatn;
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn-Black.woff2') format('woff2');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Vazirmatn';
            src: url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn[wght].woff2') format('woff2 supports variations'),
                url('{{ env('APP_URL') }}/fonts/webfonts/Vazirmatn[wght].woff2') format('woff2-variations');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        html,body,*{
            font-family: 'Vazirmatn';
        }
        header{
            background-color: #333;
            color: white;
        }
        footer{
            position: absolute;
            width: 100%;
            bottom: 0px;
        }
    @yield('style')
    </style>
    <script class="u-script" type="text/javascript" src="{{ env('APP_URL') }}/js/jquery.js" "="" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ env('APP_URL') }}/js/nicepage.js" "="" defer=""></script>
  </head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-90d9"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ env('APP_URL') }}/" style="padding: 10px 20px;">آنالیز سایت جدید</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="{{ env('APP_URL') }}/">آنالیز سایت جدید</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>

      @yield('content')

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-4e6a"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">طراح و برنامه نویس طاها امین غفوری،هرگونه کپی برداری شرعا حرام و پیگرد قانونی دارد!</p>
      </div></footer>
  
</body></html>