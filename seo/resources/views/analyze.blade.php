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
                          <td class="u-table-cell">Column 1</td>
                          <td class="u-table-cell">Column 2</td>
                          <td class="u-table-cell">Column 3</td>
                          <td class="u-table-cell">Column 4</td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">Row 1</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">Row 2</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                        </tr>
                        <tr style="height: 51px;">
                          <td class="u-table-cell">Row 3</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                        </tr>
                        <tr style="height: 52px;">
                          <td class="u-table-cell">Row 4</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                          <td class="u-table-cell">Description</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
                <div class="u-container-layout u-valign-top u-container-layout-2">
                  <p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
                    <br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                  </p>
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
      <section class="u-align-center u-clearfix u-section-2" id="sec-275f">
        <div class="u-clearfix u-sheet u-sheet-1">
          <h1 class="u-text u-text-default u-text-1">لینک های صفحه</h1>
          <div class="u-expanded-width u-table u-table-responsive u-table-1">
            <table class="u-table-entity u-table-entity-1">
              <colgroup>
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <col width="25%">
              </colgroup>
              <tbody class="u-table-body">
                <tr style="height: 64px;">
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Column 1</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Column 2</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Column 3</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Column 4</td>
                </tr>
                <tr style="height: 65px;">
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Row 1</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                </tr>
                <tr style="height: 65px;">
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Row 2</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                </tr>
                <tr style="height: 65px;">
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Row 3</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                </tr>
                <tr style="height: 65px;">
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Row 4</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                  <td class="u-border-1 u-border-grey-30 u-table-cell">Description</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
@endsection