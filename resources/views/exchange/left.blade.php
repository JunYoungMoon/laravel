<div class="lghWarp">
    <div class="lft" x-data="{ coin : $wire.entangle('coin'), market : $wire.entangle('market'), coinInfo : $wire.entangle('coinInfo')}">
        {{--고가/저가--}}
        <div class="box_dashboard ty1 market_header" x-data="{ tab1 : 'price' }">
            <div id="tit_tab11">
                <div class="market_header_topar">
                    <div class="new_ex_top">
                        <div class="new_ex_top_left">
                            <div class="h1">
                                <em>
                                    <img :alt="coinInfo.ccs_coin_name" :src="'/uploads/' + coinInfo.code + '.png'">
                                </em>
                                <span x-text="coin + ' / ' + market"></span>
                            </div>
                        </div>
                        <div class="tab_top_ar">
                            <ul>
                                <li :class="(tab1 === 'price') ? 'on' : ''"><a x-on:click="tab1 = 'price'" class="nav-link active">시세</a></li>
                                <li :class="(tab1 === 'info') ? 'on' : ''"><a x-on:click="tab1 = 'info'" class="nav-link active">정보</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{--1-1. 토큰 시세 영역--}}
                <div x-show="tab1 === 'price'" id="token_price" class="mkheader_token">
                    <div class="token_price_box">
                        <div class="token_price_box_left">
                            <div class="nex_price_ar">
                                <p class="t1">
                                    <strong class="price"></strong> {{$market}}
                                </p>
                                <p class="t2">
                                    {{--<span class="c-black">전일대비</span>--}}
                                    <strong class="percent"></strong>&percnt; <span>&sol;</span><strong class="cpd updown"></strong>
                                </p>
                            </div>
                            <div class="nex_price_more">
                                <p>고가<span class="max t3"></span></p>
                                <p>저가<span class="min t4"></span></p>
                                <p>거래량(24h) <span class="fz1"></span>  <span x-text="coin"></span> </p>
                                <p>거래대금(24h) <span class="value"></span> {{$market}} </p>
                            </div>
                        </div>
                        {{--미니차트 영역--}}
                        <div id="minichart"></div>
                    </div>
                    {{--2.차트부분--}}
                    <div class="box_dashboard ty2">
                        <div class="container center graph" id="chartContainer">
                        </div>
                    </div>
                </div>
                {{--1-2.토큰 정보 영역--}}
                <div x-show="tab1 === 'info'" id="token_info" class="mkheader_token_info">
                    <div class="tokenInfo01">
                        <div class="tokeninfo_tit" x-text="coinInfo.ccs_coin_name"></div>
                        <div class="tokeninfo_top ">
                            <p>
                                <img :src="'/uploads/' + ((coinInfo.detail?.ccsd_image) ? coinInfo.detail?.ccsd_image : '/img/token_no_image.svg')" x-on:click="window.open(this.src)">
                            </p>
                            <div class="tokeninfo_cont_ar">
                                <h4 class="tokeninfo_h4">상세설명</h4>
                                <div class="tokeninfo_cont" x-text="coinInfo.detail?.ccsd_explan"></div>
                            </div>
                        </div>
                        <div class="tokeninfo_ar">
                            <h4 class="tokeninfo_h4">모금정보</h4>
                            <div class="tokeninfo_normal">
                                <table class="tokeninfo_table">
                                    <colgroup>
                                        <col width="15%">
                                        <col width="35%">
                                        <col width="15%">
                                        <col width="35%">
                                    </colgroup>
                                    <tr>
                                        <th>총 레이즈</th>
                                        <td x-text="(coinInfo.detail?.ccsd_total_raise) ?? '-'"></td>
                                        <th>소프트캡</th>
                                        <td x-text="(coinInfo.detail?.ccsd_soft_cap) ?? '-'"></td>
                                    </tr>
                                    <tr>
                                        <th>레이즈상태</th>
                                        <td x-text="(coinInfo.detail?.ccsd_total_raise) ?? '-'"></td>
                                        <th>최소 투자</th>
                                        <td x-text="(coinInfo.detail?.ccsd_mini_invest) ?? '-'"></td>
                                    </tr>
                                    <tr>
                                        <th>승인된 투자자</th>
                                        <td x-text="(coinInfo.detail?.ccsd_approve_invest) ?? '-'"></td>
                                        <th>보안 유형</th>
                                        <td x-text="(coinInfo.detail?.ccsd_sec_type) ?? '-'"></td>
                                    </tr>
                                    <tr>
                                        <th>면제</th>
                                        <td x-text="(coinInfo.detail?.ccsd_exemption) ?? '-'"></td>
                                        <th>기구</th>
                                        <td x-text="(coinInfo.detail?.ccsd_organization) ?? '-'"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tokeninfo_ar">
                            <h4 class="tokeninfo_h4">토큰정보</h4>
                            <div class="tokeninfo_normal">
                                <table class="tokeninfo_table">
                                    <colgroup>
                                        <col width="15%">
                                        <col width="35%">
                                        <col width="15%">
                                        <col width="35%">
                                    </colgroup>
                                    <tr>
                                        <th>가격({{$coin}}</th>
                                        <td colspan="3" x-html="coinInfo.detail?.ccsd_token_price + '(<span class=\'t1 cpd\'>▼ 178,000</span>)'"></td>
                                    </tr>
                                    <tr>
                                        <th>토큰 발행처</th>
                                        <td x-text="(coinInfo.detail?.ccsd_token_issuer) ?? '-'"></td>
                                        <th>토큰 프로토콜</th>
                                        <td x-text="(coinInfo.detail?.ccsd_token_protocol) ?? '-'"></td>
                                    </tr>
                                    <tr>
                                        <th>토큰 발행 정보</th>
                                        <td x-text="(coinInfo.detail?.ccsd_token_issuer_info) ?? '-'"></td>
                                        <th>결제 옵션</th>
                                        <td x-text="(coinInfo.detail?.ccsd_payment_option) ?? '-'"></td>
                                    </tr>
                                    <tr>
                                        <th>토큰 권리</th>
                                        <td colspan="3" x-text="(coinInfo.detail?.ccsd_token_rights) ?? '-'"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--상세 영역--}}
        <div class="exLeft">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">

                {{--호가창/최근 체결가 오더북--}}
                <div class="container bns_list">

                    <div id="tit_tab5" class="extab_tit99">
                        <ul>
                            <li>일반 호가</li>
                        </ul>
                    </div>

                    <div class="tab-content exHoga_ht">
                        <div id="tabTable1_1" class="tabTable1_1_n">
                            {{--매도 테이블--}}
                            <div class="hoga_sell">
                                {{--우측 코인정보--}}
                                <div class="hoga_sell_box">
                                    <div>
                                        <dl class="hoga_dl_tit">
                                            <dt>
                                                <em>
                                                    <a href="#" onclick="openLayerPopup('popInfo01');">
{{--                                                        <img alt="<?= $coinInfo->ccs_coin_name ?>"--}}
{{--                                                             src="<?= $protocol ?><?= $_SERVER['HTTP_HOST'] ?>/uploads/<?= strtoupper($code); ?>.png">--}}
                                                    </a>
                                                </em>코인명
                                                <span x-text="coin + ' / ' + market"></span>
                                            </dt>
                                            <dd></dd>
                                        </dl>
                                        <dl class="hoga_dl_price">
                                            <dt class="t1">
                                                <strong class="price"></strong> {{$market}}
                                            </dt>
                                            <dd>
                                                <span>전일대비</span>
                                                <strong class="t2 percent"></strong>
                                            </dd>
                                        </dl>
                                        <dl class="hoga_dl">
                                            <dt>거래량</dt>
                                            <dd><span class="fz1"></span> <span>{{$coin}}</span></dd>
                                        </dl>
                                        <dl class="hoga_dl">
                                            <dt>거래대금</dt>
                                            <dd><span class="value"></span> <span>{{$market}}</span>
                                            </dd>
                                        </dl>
                                        <p class="hoga_notice_right bot_line00">(최근24시간)</p>
                                        <dl class="hoga_dl">
                                            <dt>고가</dt>
                                            <dd><p class="c-up max"></p></dd>
                                        </dl>
                                        <dl class="hoga_dl">
                                            <dt>저가</dt>
                                            <dd><p class="c-down min"></p></dd>
                                        </dl>
                                    </div>
                                </div>
                                {{--매도 물량--}}
                                <table class="hogalist sell_tbb">
                                    <colgroup>
                                        <col style="width:10%;">
                                        <col style="width:23%;">
                                        <col style="width:34%; min-width:160px;">
                                        <col style="width:23%;">
                                        <col style="width:10%;">
                                    </colgroup>
                                    <tbody class="sell_hoga" x-data="sellHoga">
                                    <template x-for="_data in data" :key="_data.quantity">
                                        <tr class="down" style="cursor: pointer">
                                            <td></td>
                                            <td>
                                                <div class="sell_gr" x-bind:style="'width:' + (_data.quantity / max * 100) + '%'"></div>
                                                <p x-text="_data.quantity.toFixed(4)"></p>
                                            </td>
                                            <td :class="{'hoga_black': parseFloat(_data.hoga_price) === parseFloat(last_price)}">
                                                <div class="hoga_div">
                                                    <ul x-bind:class="'c-' + _data.percent_color_code">
                                                    <li class="ftbd" x-text="Number(_data.hoga_price)"></li>
                                                    <li class="hoga_div_sma" x-text="_data.percent + '%'"></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </template>
                                    </tbody>
                                </table>
                            </div>
                            {{--매수 테이블--}}
                            <div class="hoga_buy">
                                {{--체결가 체결량--}}
                                <div class="hoga_buy_box">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>체결가</th>
                                            <th>체결량</th>
                                        </tr>
                                        </thead>
                                        <tbody class="hoga_buy_box_list">

                                        </tbody>
                                    </table>
                                </div>
                                {{--매수 물량--}}
                                <table class="hogalist buy_tbb">
                                    <colgroup>
                                        <col style="width:10%;">
                                        <col style="width:23%;">
                                        <col style="width:34%; min-width:160px;">
                                        <col style="width:23%;">
                                        <col style="width:10%;">
                                    </colgroup>
                                    <tbody class="buy_hoga" x-data="buyHoga">
                                    <template x-for="_data in data" :key="_data.quantity">
                                        <tr class="up" style="cursor: pointer">
                                            <td></td>
                                            <td></td>
                                            <td :class="{'hoga_black': parseFloat(_data.hoga_price) === parseFloat(last_price)}">
                                                <div class="hoga_div">
                                                    <ul x-bind:class="'c-' + _data.percent_color_code">
                                                        <li class="ftbd" x-text="Number(_data.hoga_price)"></li>
                                                        <li class="hoga_div_sma" x-text="_data.percent + '%'"></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="txal_left">
                                                <div class="buy_gr" x-bind:style="'width:' + (_data.quantity / max * 100) + '%'"></div>
                                                <p x-text="_data.quantity.toFixed(4)"></p>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{--호가창/최근 체결가--}}
            </div>
        </div>

        <div class="exCenter" x-data="{ tab2 : 'buy' }">
            {{--4.매수/매도--}}
            <div class="box_dashboard ty4">
                <div id="tit_tab2" class="extab_tit">
                    <ul>
                        <li :class="(tab2 === 'buy') ? 'on' : ''"><a class="nav-link" x-on:click="tab2 = 'buy'"><span>{{$coin}} 매수</span></a></li>
                        <li :class="(tab2 === 'sell') ? 'on' : ''"><a class="nav-link" x-on:click="tab2 = 'sell'"><span>{{$coin}} 매도</span></a></li>
                    </ul>
                </div>
                <div id="ttab2_1" class="extab_cont" x-show="tab2 === 'buy'">
                    <div class="cont">
                        <ul>
                            <li>
                                <p class="h">주문형태</p>
                                <div id="tit_tab2_1" class="tab">
                                    <ul>
                                        <li onclick="submitmode=1;set_fee();maxvalue();$('.buy_price').val(0);">
                                            <a href="#"
                                               onclick="submitmode=1;set_fee();maxvalue();$('.buy_price').val(0);">
                                                <span>지정가</span>
                                            </a>
                                        </li>
                                        <li onclick="submitmode=2;set_fee();maxvalue();$('.buy_price').val(now_price);">
                                            <a href="#"
                                               onclick="submitmode=2;set_fee();maxvalue();$('.buy_price').val(now_price);">
                                                <span>시장가</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <p class="h">주문가능</p>
                                <div class="">
                                    <p><span class="available_buy_price spstst">0</span> {{$market}}</p>
                                    {{--<button type="button" class="btn-pk red2 s bdrs fl-r"><span class="ico_i">상승장 렌딩</span></button>--}}
                                </div>
                            </li>
                            <li>
                                <p class="h">주문가격</p>
                                <div class="">
                                    <div class="inp_num">
                                        <input type="number" class="inp_txt w100p buy_price"
                                               onchange="set_fee();maxvalue();" x-ref="buy_price" id="buy_price">
                                        <button type="button" class="btn_top"
                                                onclick="priceupdown('buy','down');"><span
                                                class="ico">수량 더하기</span></button>
                                        <button type="button" class="btn_down"
                                                onclick="priceupdown('buy','up');"><span
                                                class="ico">수량 빼기</span></button>
                                    </div>
                                    <p class="fz1 ta-r">최대 주문 가능 수량 <span class="c-black"
                                                                          id="max_v">0.0000</span></p>
                                </div>
                            </li>
                            <li>
                                <p class="h">주문수량</p>
                                <div class="">
                                    <div class="box-f" style="display:block">
                                        <div class="b">
                                            <input type="text" class="inp_txt buy_qtt"
                                                   placeholder="최소 = 0.0001{{$coin}}(500{{$market}}이상) "
                                                   onchange="set_fee();"  x-ref="buy_qtt" id="buy_qtt">
                                            <span>{{$coin}}</span>
                                        </div>
                                    </div>
                                    <div class="box-t">
                                        <ul>
                                            <li class="on"><a href="#"
                                                              onclick="percent_func('buy', this);">10%</a></li>
                                            <li><a href="#" onclick="percent_func('buy', this);">25%</a></li>
                                            <li><a href="#" onclick="percent_func('buy', this);">50%</a></li>
                                            <li><a href="#" onclick="percent_func('buy', this);">100%</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="line-top">
                                <p class="h">주문금액</p>
                                <div class="">
                                    <p><span class="buy_total_sum">0</span>{{$market}}</p>
                                </div>
                            </li>
                            <li>
                                <p class="h">수수료
                                    <button type="button" onclick="openLayerPopup('popHelp01');"><span
                                            class="ico_q">도움말</span></button>
                                </p>
                                <div class="">
                                    <p><span class="buy_fee">0</span>{{$market}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="botm">
                        @auth
                        <ul>
                            <li><a href="#" class="btn-pk b w100p red"
                                   wire:click="buy($refs.buy_price.value, $refs.buy_qtt.value)"><span>{{$coin}} 매수</span></a>
                            </li>
                            <li><a href="" class="btn-pk b2 gray3"><img src="/img/comm/icon_f5.svg"></a>
                            </li>
                        </ul>
                        @else
                        <a href="/login" class="btn-pk b w100p dkblue2">로그인</a>
                        @endauth
                    </div>
                </div>
                <div id="ttab2_2" class="extab_cont" x-show="tab2 === 'sell'">
                    <div class="cont">
                        <ul>
                            <li>
                                <p class="h">주문형태</p>
                                <div id="tit_tab2_2" class="tab">
                                    <ul>
                                        <li onclick="submitmode=1;set_fee();$('.sell_price').val(0);">
                                            <a href="#"
                                               onclick="submitmode=1;set_fee();$('.sell_price').val(0);">
                                                <span>지정가</span>
                                            </a>
                                        </li>
                                        <li onclick="submitmode=2;set_fee();$('.sell_price').val(now_price);">
                                            <a href="#"
                                               onclick="submitmode=2;set_fee();$('.sell_price').val(now_price);">
                                                <span>시장가</span>
                                            </a>
                                        </li>
                                        {{--<li onclick="submitmode=3;"><a href="#" onclick="submitmode=3;"><span>자동</span></a> <button type="button"><span class="ico_q">도움말</span></button></li> --}}
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <p class="h">주문가능</p>
                                <div class="">
                                    <p><span class="available_sell_price spstst">0</span>{{$coin}}</p>
                                    {{--<button type="button" class="btn-pk red2 s bdrs fl-r"><span class="ico_i">상승장 렌딩</span></button>--}}
                                </div>
                            </li>
                            <li>
                                <p class="h">주문가격</p>
                                <div class="">
                                    <div class="inp_num">
                                        <input type="number" class="inp_txt w100p sell_price"
                                               onchange="set_fee();" id="sell_price">
                                        <button type="button" class="btn_top"
                                                onclick="priceupdown('sell','down');"><span
                                                class="ico">수량 더하기</span></button>
                                        <button type="button" class="btn_down"
                                                onclick="priceupdown('sell','up');"><span
                                                class="ico">수량 빼기</span></button>
                                    </div>
                                    <p class="fz1 ta-r"><span class="c-black"></span></p>
                                </div>
                            </li>
                            <li>
                                <p class="h">주문수량</p>
                                <div class="">
                                    <div class="box-f" style="display: block">
                                        <div class="b">
                                            <input type="text" class="inp_txt sell_qtt w100p"
                                                   placeholder="최소 = 0.0001" onchange="set_fee();"
                                                   id="sell_qtt">
                                            <span>{{$coin}}</span>
                                        </div>
                                    </div>
                                    <div class="box-t">
                                        <ul>
                                            <li class="on"><a href="#"
                                                              onclick="percent_func('sell', this);">10%</a></li>
                                            <li><a href="#" onclick="percent_func('sell', this);">25%</a></li>
                                            <li><a href="#" onclick="percent_func('sell', this);">50%</a></li>
                                            <li><a href="#" onclick="percent_func('sell', this);">100%</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="line-top">
                                <p class="h">주문금액</p>
                                <div class="">
                                    <p>
                                        <span class="sell_total_sum">0</span>{{$market}}</p>
                                </div>
                            </li>
                            <li>
                                <p class="h">수수료
                                    <button type="button" onclick="openLayerPopup('popHelp02');"><span
                                            class="ico_q">도움말</span></button>
                                </p>
                                <div class="">
                                    <p><span class="sell_fee">0</span>{{$market}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="botm">
                        @auth
                        <ul>
                            <li><a href="#" class="btn-pk b blue w100p"
                                   onclick="submit_check('sell'); return false;"><span>{{$coin}} 매도</span></a>
                            </li>
                            <li><a href="" class="btn-pk b2 gray3"><img src="/img/comm/icon_f5.svg"></a>
                            </li>
                        </ul>
                        @else
                        <a href="/login" class="btn-pk b w100p dkblue2">로그인</a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- 6.체결 리스트 -->
            <div class="box_dashboard ty6">
                <div id="tit_tab4" class="extab_tit01">
                    <ul>
                        <li class="on"><a class="nav-link active" href="#order_list1"><span>미체결 주문</span></a>
                        </li>
                        <li><a class="nav-link" href="#order_list2"><span>체결 주문</span></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="cont" id="order_list1">
                        <div class="tbl_top">
                            <div class="lft">
                                <div class="tab-link">
                                    <ul>
                                        <li class="on"
                                            onclick="select_order_date = 1; order_out_updata2(order_list);"><a
                                                href="#"
                                                onclick="select_order_date = 1; order_out_updata2(order_list);">당일</a>
                                        </li>
                                        <li onclick="select_order_date = 2; order_out_updata2(order_list);"><a
                                                href="#"
                                                onclick="select_order_date = 2; order_out_updata2(order_list);">7일</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="rgh">
                                <button onclick="getSelectedCancel()">선택 취소</button>
                                {{--<a href="#" class="a_link c-black">전체보기</a>--}}
                                <select class="select1"
                                        onchange="select_order_type = this.value; order_out_updata2(order_list);">
                                    <option value="전체">전체</option>
                                    <option value="매수">매수</option>
                                    <option value="매도">매도</option>
                                </select>
                            </div>
                        </div>
                        <div class="tbl_basic">
                            <table class="list">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th rowspan="2">체결일시</th>
                                    <th>자산</th>
                                    <th>체결수량</th>
                                    <th>체결가격</th>
                                    <th rowspan="2">주문일시</th>
                                </tr>
                                <tr>
                                    <th>구분</th>
                                    <th>주문가격</th>
                                    <th>체결금액</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="scrollY tbl_basic mbtn_ty1">
                            <table class="list">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <tbody class="notexch_box">

                                <tr>
                                    <td colspan="5" class="notx tb_td_ctt">거래 내역이 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cont" id="order_list2">
                        <div class="tbl_top">
                            <div class="lft">
                                <div class="tab-link">
                                    <ul>
                                        <li class="on"
                                            onclick="select_order_date2 = 1; order_updata2(order_list2);"><a
                                                href="#"
                                                onclick="select_order_date2 = 1; order_updata2(order_list2);">당일</a>
                                        </li>
                                        <li onclick="select_order_date2 = 2; order_updata2(order_list2);"><a
                                                href="#"
                                                onclick="select_order_date2 = 2; order_updata2(order_list2);">7일</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="rgh">
                                {{--<a href="#" class="a_link c-black">전체보기</a>--}}
                                <select class="select1"
                                        onchange="select_order_type2 = this.value; order_updata2(order_list2);">
                                    <option value="전체">전체</option>
                                    <option value="매수">매수</option>
                                    <option value="매도">매도</option>
                                </select>
                            </div>
                        </div>
                        <div class="tbl_basic">
                            <table class="list">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th rowspan="2">체결일시</th>
                                    <th>자산</th>
                                    <th>체결수량</th>
                                    <th>체결가격</th>
                                    <th rowspan="2">주문일시</th>
                                </tr>
                                <tr>
                                    <th>구분</th>
                                    <th>주문가격</th>
                                    <th>체결금액</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="scrollY tbl_basic mbtn_ty1">
                            <table class="list">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>

                                <tbody class="order_updata_list">

                                <tr>
                                    <td colspan="5" class="notx tb_td_ctt">거래 내역이 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--3.체결/일별--}}
        <div class="box_dashboard ty3">
            <div id="tit_tab1" class="extab_tit00">
                <ul>
                    <li class="on"><a class="nav-link active" href="#tabTable1"><span>체결</span></a></li>
                    <li><a class="nav-link active" href="#tabTable2"><span>일별</span></a></li>
                </ul>
            </div>
            <div class="cont">
                <div id="tabTable1" class="tbl_basic">
                    <div>
                        <table class="list">
                            <thead>
                            <tr>
                                <th>체결시간</th>
                                <th>체결가격({{$market}})</th>
                                <th>체결량({{$coin}})</th>
                                <th class="ta-r">체결금액</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                    <div class="scrollY">
                        <table class="list">
                            <tbody class="history_box">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="tabTable2" class="tbl_basic">
                    <div class="tbl_basic">
                        <div>
                            <table class="list">
                                <colgroup>
                                    <col class="w100">
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>일자</th>
                                    <th>종가</th>
                                    <th>전일대비</th>
                                    <th class="ta-r">거래량({{$coin}})</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="scrollY">
                            <table class="list">
                                <colgroup>
                                    <col class="w100">
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <tbody>
                                <?php
/*                                /*$tmpprice = 0;
                                foreach ($dayorderlist as $row) {
                                    $updown = "c-up";
                                    if ($tmpprice > $row['price']) {
                                        $updown = "c-down";
                                    } */?>
                                <tr>
                                    <td><?php /*$row['order_date']*/ ?></td>
                                    <td><strong class="<?php /*$updown */?>"><?php /*$row['price']*/ ?></strong></td>
                                    <td><span class="<?php /*$updown*/ ?>"><?php /*$row['avg']*/ ?>%</span></td>
                                    <td class="ta-r"><?php /*$row['amount']*/ ?></td>
                                </tr>
                                    <?php
                                  /*  $tmpprice = $row['price'];
                                } */?>
                                    {{--<tr>
                                <td>05.08</td>
                                <td><strong class="c-down">25,322,000</strong></td>
                                <td><span class="c-down">-5.5%</span></td>
                                <td class="ta-r">1,376,546</td>
                            </tr>--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}

@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="{{ asset('/vendor/trading-view/charting_library/charting_library.standalone.js') }}"></script>
<script src="{{ asset('/vendor/trading-view/datafeeds/udf/dist/bundle.js') }}"></script>
@endassets

<script>
    //spa라서 페이지내에서 뒤로가기, 앞으로가기를 모두 제어하기 어렵기 때문에 그냥 페이지 자체를 reload를 한다.
    //또한 크롬 브라우저 이슈로 어쩔땐 render를 타고 어쩔땐 cache를 타고 정확한 포인트를 잡기 힘들다.
    //render를 탄다고 해도 /livewire/update를 request로 가져가기 때문에 변경된 현재 파라미터를 서버측에서 알기 힘들다.
    //그러면 snapshot으로 가져오면 되지 않겠냐? snapshot은 이전 데이터를 가지고 있다.
    window.addEventListener("popstate", function () {
        if (window.location.pathname === '/exchange') {
            window.location.reload();
        }
    });
</script>

@script
<script>
    console.log($wire.coinInfo);

    let exchangeConnect = io.connect('{{$exchangeAddress}}');
    let datafeedConnect = io.connect('{{$datafeedAddress}}');
    let hogaConnect = io.connect('{{$hogaAddress}}');

    document.addEventListener('livewire:navigated', () => {
        let queryString = window.location.search;
        let searchParams = new URLSearchParams(queryString);
        let symbol = searchParams.get('code').split('-');

        setTradingViewChart(symbol[0], symbol[1]);
        socketJoinRoom(symbol[0], symbol[1]);

        Livewire.on('initializeLeft', (symbol) => {
            setTradingViewChart(symbol[0]['market'], symbol[0]['coin']);
            socketJoinRoom(symbol[0]['market'], symbol[0]['coin']);
        });

    }, {once: true}); //이벤트 리스너가 실행된 후 제거하는 방법

    function setTradingViewChart(market, coin) {
        let checkChart = $('#chartContainer iframe').length;

        if (checkChart && widget !== null) {
            // 차트가 있으면 내용만 교체
            widget.chart().setSymbol(coin + '_' + market, '1D', () => {
                console.log('Chart updated with symbol:', coin + '_' + market);
            });
        } else {
            // 차트가 없으면 차트를 새로 생성
            initializeChart(market, coin);
        }
    }

    function initializeChart(market, coin) {
        let initialState = {
            width: '100%',
            height: '445',
            interval: '1D',
            symbol: coin + "_" + market,
            timezone: "Asia/Seoul",
            debug: false,
            container: "chartContainer",
            library_path: "/vendor/trading-view/charting_library/",
            locale: "ko",
            enabled_features: ["keep_left_toolbar_visible_on_small_screens"],
            disabled_features: [
                "use_localstorage_for_settings",
                "header_compare"{{--+버튼--}},
            ],
            datafeed: {
                onReady: function (cb) {
                    setTimeout(function () {
                        cb(['60', '1', '5', '15', '30', 'D', "2D", "3D", "W", "3W", "M"]);
                    }, 0);
                },
                resolveSymbol: function (symbolName, onSymbolResolvedCallback, onResolveErrorCallback) {
                    try {
                        setTimeout(function () {
                            onSymbolResolvedCallback({
                                name: symbolName,
                                description: "",
                                type: symbolName,
                                session: "24x7",
                                timezone: "Asia/Seoul",
                                ticker: symbolName,
                                minmov: 1,
                                pricescale: 100000000,
                                has_intraday: true,
                                supported_resolutions: ['1', '5', '15', '30', '60', 'D', "2D", "3D", "W", "3W", "M"],
                                visible_plots_set: 'ohlcv',
                                has_weekly_and_monthly: false,
                                volume_precision: 2,
                                data_status: "streaming",
                                supports_search: false, {{--Disable symbol search--}}
                                disabled_features: ["use_localstorage_for_settings", "header_symbol_search "],
                            });
                        }, 0);
                    } catch (err) {
                        onResolveErrorCallback(err.message);
                    }
                },
                getBars: function (symbolInfo, resolution, periodParams, onHistoryCallback, Callback, firstDataRequest) {
                    global_resolution = resolution;

                    let arg = {
                        resolution: resolution,
                        symbol: symbolInfo.name,
                        from: periodParams.from,
                        to: periodParams.to
                    };

                    $.get('{{$datafeedAddress}}' + '/history', arg, function (r) {
                        let bars = [];
                        for (let i = 0; i < r.t.length; ++i) {
                            let bar = {
                                time: 1e3 * r.t[i],
                                close: parseFloat(r.c[i]),
                                open: parseFloat(r.o[i]),
                                high: parseFloat(r.h[i]),
                                low: parseFloat(r.l[i]),
                                volume: parseFloat(r.v[i])
                            }
                            bars.push(bar)
                        }

                        onHistoryCallback(bars, {
                            noData: bars.length <= 0
                        });
                    }, "json");
                },
                subscribeBars: function (symbolInfo, resolution, onRealtimeCallback, subscribeUID, onResetCacheNeededCallback) {
                    chart_realtime_callback = onRealtimeCallback; {{--여기에 차트 콜백함수 부여--}}
                },
                unsubscribeBars: function (subscriberUID) {
                },
            },
        }

        widget = new TradingView.widget(initialState);

        widget.onChartReady(() => {
            widget.headerReady().then(function () {
                // 새로운 버튼을 생성
                let button = widget.createButton();
                button.setAttribute('title', '초기화');
                button.textContent = '초기화';

                // 버튼에 클릭 이벤트를 추가
                button.addEventListener('click', function () {
                    initializeChart($wire.market, $wire.coin)
                });
            });
        });
    }

    // 룸 접속
    function socketJoinRoom(market, coin) {
        hogaConnect.emit('joinRoom', coin, market);
    }

    // 호가창
    hogaConnect.on('hoga', function (data) {
        if (data != null) {
            try {
                data.sell.reverse();
            } catch (err) {
                console.log(err);
            }

            let maxQuantity = 0;

            data.buy.forEach(function (_data) {
                if (_data.quantity > maxQuantity) {
                    maxQuantity = _data.quantity;
                }
            });

            data.sell.forEach(function (_data) {
                if (_data.quantity > maxQuantity) {
                    maxQuantity = _data.quantity;
                }
            });

            try {
                updateOrderBook(data.sell, maxQuantity, sellApp);
                updateOrderBook(data.buy, maxQuantity, buyApp);
            } catch (err) {
                console.log(err);
            }
        }
    });

    let max = 0;
    let last_price = $wire.coinInfo.price.lastPrice;
    let yesterday_price = $wire.coinInfo.price.yesterdayPrice;

    function hogaUpdate(data, max, last_price) {
        return Alpine.reactive({
            data: data,
            max: max,
            last_price: last_price
        });
    }

    let initial_data = [{
        quantity: 0,
        percent_color_code: '',
        hoga_price: 0,
        percent: 0,
        last_price: 0,
    }];

    const sellApp = hogaUpdate(initial_data , max, last_price);
    const buyApp = hogaUpdate(initial_data , max, last_price);

    Alpine.data('sellHoga', () => (
        sellApp
    ));

    Alpine.data('buyHoga', () => (
        buyApp
    ));

    function updateOrderBook(data, max, app) {
        app.max = max;
        app.data = data.map(_data => {
            let percent_price;
            let percent;

            if (yesterday_price === null || yesterday_price === undefined || Number(yesterday_price) === 0) {
                percent_price = _data.hoga_price - last_price;

                if (last_price === 0) {
                    percent = (_data.hoga_price - last_price);
                } else {
                    percent = ((_data.hoga_price - last_price) / last_price) * 100;
                }
            } else {
                percent_price = _data.hoga_price - yesterday_price;
                percent = ((_data.hoga_price - yesterday_price) / yesterday_price) * 100;
            }

            percent = percent.toFixed(2);

            let percent_color_code = '';

            if (percent_price < 0) {
                percent_color_code = 'blue';
            } else {
                percent_color_code = 'red';
            }

            if (percent == 'NaN' || percent_price == '0') {
                percent_color_code = 'red';
                percent = "0.00";
            }

            if (percent == 0.00) {
                percent_color_code = 'black';
            }

            _data.percent = percent;
            _data.percent_color_code = percent_color_code;

            return _data;
        });
    }

    // 호가창 안에 작은 체결창
    hogaConnect.on('his', function (data) {
        console.log(data);
    });
</script>
@endscript
