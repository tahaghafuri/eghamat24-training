@extends('layouts.app')
@section('name','آنالیز')
@section('style','.u-section-1 .u-sheet-1 {
    min-height: 500px;
  }
  
  .u-section-1 .u-tabs-1 {
    min-height: 406px;
    margin: 60px auto 60px 0;
  }
  
  .u-section-1 .u-tab-link-1 {
    font-size: 1.25rem;
    background-image: none;
    font-weight: 600;
    padding: 10px 25px;
  }
  
  .u-section-1 .u-tab-link-2 {
    font-size: 1.25rem;
    background-image: none;
    font-weight: 600;
    padding: 10px 25px;
  }
  
  .u-section-1 .u-tab-link-3 {
    font-size: 1.25rem;
    background-image: none;
    font-weight: 600;
    padding: 10px 25px;
  }
  
  .u-section-1 .u-tab-item-4 {
    margin-bottom: 0;
  }
  
  .u-section-1 .u-tab-link-4 {
    font-size: 1.25rem;
    background-image: none;
    font-weight: 600;
    padding: 10px 25px;
  }
  
  .u-section-1 .u-tab-pane-1 {
    background-image: none;
  }
  
  .u-section-1 .u-container-layout-1 {
    padding: 30px 25px;
  }
  
  .u-section-1 .u-text-1 {
    margin: 0 auto 0 0;
  }
  
  .u-section-1 .u-table-1 {
    margin: 30px auto -30px 0;
  }
  
  .u-section-1 .u-tab-pane-2 {
    background-image: none;
  }
  
  .u-section-1 .u-container-layout-2 {
    padding: 30px 25px;
  }
  
  .u-section-1 .u-text-2 {
    line-height: 1.8;
    margin: 0;
  }
  
  .u-section-1 .u-tab-pane-3 {
    background-image: none;
  }
  
  .u-section-1 .u-container-layout-3 {
    padding: 30px 25px;
  }
  
  .u-section-1 .u-text-3 {
    margin-top: 0;
    margin-bottom: 0;
  }
  
  .u-section-1 .u-text-4 {
    margin-left: 0;
    margin-bottom: 0;
  }
  
  .u-section-1 .u-btn-1 {
    margin-left: 0;
    margin-right: 0;
    border-style: solid;
    text-transform: uppercase;
  }
  
  .u-section-1 .u-tab-pane-4 {
    background-image: none;
  }
  
  .u-section-1 .u-container-layout-4 {
    padding: 30px 25px;
  }
  
  @media (max-width: 1199px) {
    .u-section-1 .u-tabs-1 {
      height: auto;
      margin-right: initial;
      margin-left: initial;
    }
  
    .u-section-1 .u-text-1 {
      line-height: 28.8px;
      font-weight: 400;
    }
  
    .u-section-1 .u-table-1 {
      margin-right: initial;
      margin-left: initial;
    }
  }
  
  @media (max-width: 767px) {
    .u-section-1 .u-container-layout-1 {
      padding-left: 10px;
      padding-right: 10px;
    }
  
    .u-section-1 .u-container-layout-2 {
      padding-left: 10px;
      padding-right: 10px;
    }
  
    .u-section-1 .u-container-layout-3 {
      padding-left: 10px;
      padding-right: 10px;
    }
  
    .u-section-1 .u-container-layout-4 {
      padding-left: 10px;
      padding-right: 10px;
    }
  }.u-section-2 .u-sheet-1 {
    min-height: 464px;
  }
  
  .u-section-2 .u-text-1 {
    margin: 26px auto 0;
  }
  
  .u-section-2 .u-table-1 {
    margin-top: 22px;
    margin-bottom: 40px;
  }
  
  .u-section-2 .u-table-entity-1 {
    min-height: 100px;
  }
  
  .u-block-e76c-4 {
    background-image: none;
  }')
@section('content')
{{ $urls }}
    <section class="u-align-center u-clearfix u-section-1" id="sec-c23e">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
          <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
            <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
              <li class="u-tab-item" role="presentation">
                <a class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">قواعد عمومی</a>
              </li>
              <li class="u-tab-item" role="presentation">
                <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-2" id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">بررسی فنی</a>
              </li>
              <li class="u-tab-item" role="presentation">
                <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-3" id="link-tab-2917" href="#tab-2917" role="tab" aria-controls="tab-2917" aria-selected="false">تجزیه و تحلیل</a>
              </li>
              <li class="u-tab-item u-tab-item-4" role="presentation">
                <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-4" id="tab-93fc" href="#link-tab-93fc" role="tab" aria-controls="link-tab-93fc" aria-selected="false"> تجزیه و تحلیل لینک </a>
              </li>
            </ul>
            <div class="u-tab-content">
              <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <div class="u-expanded-width u-table u-table-responsive u-table-1">
                    <table class="u-table-entity">
                      <colgroup>
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                      </colgroup>
                      <tbody class="u-table-alt-grey-5 u-table-body">
                        <tr style="height: 51px;">
                          <td class="u-table-cell">عنوان</td>
                          <td class="u-table-cell">وضعیت</td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">عنوان صفحه</td>
                          <td class="u-table-cell">
                            @if(!empty($infos['title']))
                            @if(mb_strlen($infos['title']) < 70 || mb_strlen($infos['title']) < 50)
                            کوتاه و نامناسب
                            @else
                              مناسب
                            @endif 
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">توضیحات صفحه</td>
                          <td class="u-table-cell">
                            @if(!empty($infos['description']))
                            @if(mb_strlen($infos['description']) < 170 || mb_strlen($infos['description']) < 150)
                            کوتاه و نامناسب
                            @else
                              مناسب
                            @endif   
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">المان caniocal</td>
                          <td class="u-table-cell">
                            @if(!empty($metas['caniocal']))
                            دارد
                            @else
                            ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">تگ robots</td>
                          <td class="u-table-cell">
                            @if(!empty($metas['robots']))
                              @if(strstr($metas['robots'],'index') || strstr($metas['robots'],'follow') || (strstr($metas['robots'],'index') && strstr($metas['robots'],'follow')))
                              فالو
                              @elseif(strstr($metas['robots'],'noindex') || strstr($metas['robots'],'nofollow') || (strstr($metas['robots'],'noindex') && strstr($metas['robots'],'nofollow')))
                              نوفالو
                              @endif
                            @else
                              ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">مقایسه المان نام هدینگ و عنوان</td>
                          <td class="u-table-cell">
                            @if(!empty($h1s[0]))
                            @if($h1s[0]!=$infos['title'])
                            یکسان نیستند
                            @else
                              یکسانند
                            @endif
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">تگ های h2 تا h6</td>
                          <td class="u-table-cell">
                            @if(!empty($hs))
                              دارد
                            @else 
                              ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">خصوصیات alt تصاویر</td>
                          <td class="u-table-cell">
                            @if(!empty($images[0]))
                              @if(count($images[0])==count($images[1]))
                                  دارد
                              @else
                              از {{ count($images[0]) }} تصویر فقط {{ count($images[1]) }} تصویر alt دارند
                              @endif
                            @else
                              ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">طول محتوای تگ h1</td>
                          <td class="u-table-cell">
                            @if(!empty($h1s[0]))
                              @if(mb_strlen($h1s[0])<60)
                                مناسب
                              @else
                                نامناسب
                              @endif
                            @else
                             ندارد
                            @endif
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <div class="u-expanded-width u-table u-table-responsive u-table-1">
                    <table class="u-table-entity">
                      <colgroup>
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                      </colgroup>
                      <tbody class="u-table-alt-grey-5 u-table-body">
                        <tr style="height: 51px;">
                          <td class="u-table-cell">عنوان</td>
                          <td class="u-table-cell">وضعیت</td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">بررسی تگ‌های strong و b</td>
                          <td class="u-table-cell">
                          @if(!empty($bs) && !empty($strongs))
                            دارد
                          @else
                            ندارد
                          @endif
                          </td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">فاویکون</td>
                          <td class="u-table-cell">
                            @if(!empty($metas['shortcut icon']))
                            دارد
                            @else
                            ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">تگ viewport</td>
                          <td class="u-table-cell">
                            @if(!empty($metas['viewport']))
                            دارد
                            @else
                            ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">تگ description</td>
                          <td class="u-table-cell">
                            @if(!empty($metas['description']))
                            دارد
                            @else
                            ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">فایل robots.txt</td>
                          <td class="u-table-cell">
                            @if(!empty($infos['robots']))
                            @if($infos['robots']==200 || $infos['robots']=='200')
                            دارد
                            @else
                                ندارد
                            @endif
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">سایت مپ</td>
                          <td class="u-table-cell">
                            @if(!empty($infos['sitemap']))
                            @if($infos['sitemap']==200 || $infos['sitemap']=='200')
                            دارد
                            @else
                                ندارد
                            @endif
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">حجم صفحه</td>
                          <td class="u-table-cell">
                            @if(!empty($infos['infos']['size_download']))
                            حجم صفحه {{ $infos['infos']['size_download'] }} بایت است
                            @else
                                ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">پروتکل امنیتی</td>
                          <td class="u-table-cell">
                            @if($infos['infos']['ssl_verifyresult']==0)
                             دارد
                            @else
                             ندارد
                            @endif
                          </td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">ریدایرکت</td>
                          <td class="u-table-cell">
                            @if($infos['status']==301 || $infos['status']==302)
                             دارد
                            @else
                             ندارد
                            @endif
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel" aria-labelledby="link-tab-2917">
                <div class="u-container-layout u-container-layout-3">
                  <h4 class="u-text u-text-default u-text-3">Be The First To Review This Product!</h4>
                  <p class="u-text u-text-default u-text-4">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                  <a href="" class="u-btn u-button-style u-btn-1">write product review</a>
                </div>
              </div>
              <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="link-tab-93fc" role="tabpanel" aria-labelledby="tab-93fc">
                <div class="u-container-layout u-container-layout-4"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection