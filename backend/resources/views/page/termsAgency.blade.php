@extends('layouts.page')

<!-- タイトル・メタディスクリプション -->
@section('title', '出品代行機能利用規約 | モアクロ')
@section('description', '出品代行機能利用規約')

<!-- CSS -->
@push('css')
<link rel="stylesheet" href="{{ asset('css/page/other.css') }}">
@endpush

<!-- 本文 -->
@section('content')
<section class="other__screen">
    <div class="l-wrap">
        <h1>出品代行機能利用規約</h1>
    </div>
</section>
<section class="other__content page__other">
    <div class="l-wrap">
        <article class="uk-article">
            <p>ユーザーが「お任せ出品」機能を利用する際は、Web規約、利用規約の他、以下の規約（以下、「お任せ出品機能利用規約」といいます）が適用されます。本出品機能をご利用になる際には、事前に以下の内容をご確認、ご了承のうえ、ご利用ください。</p>
            <h2>第１条（本出品機能）</h2>
            <p>「出品代行」機能（以下、「本出品機能」といいます。）は、ユーザーが当社に対し、more clothingの荷物のうちユーザーの指定する物を、外部サイトを通じて出品・販売することを委託できるサービスです。</p>
            <h2>第２条（申込）</h2>
            <div class="uk-child-width-expand@s" uk-grid>
                <ul class="uk-list uk-list-decimal">
                    <li>本出品機能の利用を希望するユーザーは、当社に対し、当社が別途定める方法により、利用開始申込みを行うものとします。かかる申込みを当社が承諾することにより、ユーザーは本出品機能を利用することができるようになります。</li>
                    <li>当社は、本出品機能の提供にあたり、当社が別途定める方法により、ユーザーの本人確認を行うものとし、ユーザーは、本人限定受取郵便の受領（運転免許証、パスポート、健康保険証等の公的証明書の提示を含む）等、必要な協力を行うものとします。</li>
                    <li>前項の本人確認ができない場合、当社は、本商品の出品を拒絶し又は取消す等、必要な措置を取ることができるものとします。</li>
                </ul>
            </div>
            <h2>第３条（本商品の出品）</h2>
            <div class="uk-child-width-expand@s" uk-grid>
                <ul class="uk-list uk-list-decimal">
                    <li>当社は、more clothingの荷物のうちユーザーが外部サイトにおいて出品を希望する物として指定することができます（以下、「本指定」といいます）。</li>
                    <li>当社は、本指定を受けた荷物（以下、「本商品」といいます）を、当社又は当社が指定する第三者の名義で、外部サイトにおいて本商品を出品します（以下、「お任せ出品」といいます）。</li>
                    <li>ユーザーは、本商品についての初回のおまかせ出品に際し、本商品の出品価格を決定することができるものとします。ユーザーは、一度決定した出品価格を変更することはできません。</li>
                    <li>本商品についての初回のおまかせ出品により売買契約が成立しなかった場合、当社は、当社の判断により、本商品の再出品価格、出品期間、その他の出品条件を設定することができるものとします。最終的な売買代金が初回出品時にユーザーが決定した出品価格を下回る可能性があることにご注意ください。</li>
                    <li>ユーザーは、一度行った本指定を取り消すことはできません。おまかせ出品後に、おまかせ出品を取消することも不可です。</li>
                    <li>商品が3か月売れなかった場合は、自動で出品を停止します。その際当社からユーザーに通知することとし、商品はご自身の持ち物リストに戻ります。</li>
                </ul>
            </div>
            <h2>第４条（対象外の商品）</h2>
            <div class="uk-child-width-expand@s" uk-grid>
                <ul class="uk-list uk-list-decimal">
                    <li>ユーザーは下記の荷物については、本出品機能を利用することができません。
                        <ul class="uk-list uk-list-decimal">
                            <li>当社が別途定める低価格メーカー、ブランド</li>
                            <li>当社が別途定める偽造品・コピー品の多いブランド</li>
                            <li>本、雑誌、CD、DVD</li>
                            <li>当社が別途定めるアダルトなどのカテゴリに属する物</li>
                            <li>販売価格が3,000円に満たないと当社が判断する物</li>
                            <li>販売価格に絶対的なご希望のある物</li>
                            <li>その他当社が適切でないと判断する物</li>
                        </ul>
                    </li>
                    <li>前項各号に定める荷物に関する本指定があった場合、当社は当該本指定を拒絶することができるものとします。</li>
                    <li>第１項各号に定める荷物がお任せ出品された場合、当社はユーザーの許可なく当該お任せ出品を取り消すことができるものとします。</li>
                    <li>前２項の拒絶又は取消しの対象になった荷物については、当社の判断により返却、処分、又はユーザーから任意の価格での買取りを行うことができるものとします。</li>
                </ul>
            </div>
            <h2>第５条（売買契約の成立）</h2>
            <p>本商品が外部サイトにおいて落札又は購入された時点で、ユーザーと当社との間に、当社と購入者との間で成立する売買契約と同額の売買代金を条件とする売買契約が成立するものとします。</p>
            <h2>第６条（利用料）</h2>
            <div class="uk-child-width-expand@s" uk-grid>
                <ul class="uk-list uk-list-decimal">
                    <li>ユーザーは、本出品機能の利用の対価として、当社に対し、下記の利用料をポイントにて支払います。
                        <p>販売価格-10％（販売代行業者手数料）-発送料=売上利益<br>売上利益×50％=当社利用料</p>
                        <p>（売上利益の50％がユーザーに支払われるポイント額となります）</p>
                    </li>
                    <li>当社とユーザー間の売買契約の成立後、ユーザーは、当社所定の手続により、本商品の売買代金の支払を申請することができます（以下、「支払申請」といいます）。</li>
                    <li>支払申請は、必ずユーザー本人自らが行わなければならず、第三者に代理させることや受領権を第三者に譲渡することはできません。</li>
                    <li>当社は、支払申請を受けた場合、決済事業者をして、売買代金から振込手数料及び本条に定める利用料を差し引いた額をユーザーが指定する銀行口座へ振り込むことにより支払わせます。なお、ユーザーが誤った振込先銀行口座を指定したことによってユーザーに生じた損害に関して、当社は一切責任を負いません。</li>
                    <li>当社は、以下各号の場合において、ユーザーが支払申請をする権利を放棄したとみなすことができます。ポイントとしての保存も不可です。
                        <ul class="uk-list uk-list-decimal">
                            <li>当社が、振込先銀行口座を指定するようユーザーに通知したにもかかわらず、ユーザーがかかる通知後1年以内に有効な振込先銀行口座を指定しない場合</li>
                            <li>当社が、支払申請をするようユーザーに通知したにもかかわらず、ユーザーがかかる通知後1年以内に支払申請をしない場合</li>
                            <li>当社が本出品機能の提供を終了する時点で、支払未了の売買代金総額が、その支払に必要な振込手数料に満たない場合</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <h2>第７条（再委託）</h2>
            <p>当社は、本出品機能に係る業務の全部または一部を、当社の責任において第三者に再委託することができるものとします。</p>
            <h2>第８条（紛争等の解決）</h2>
            <p>本出品機能を利用した本商品の出品・販売に関連して、購入者その他の第三者との間で、本商品の瑕疵、不良等の苦情、要求、クレーム、本商品の返品、損害賠償の請求その他事実上または法律上の紛争（以下、｢紛争等｣といいます）が生じ、当社が紛争等に関連して損害賠償金の支払い・和解金の支払その他の出捐を余儀なくされたときは、ユーザーは、当社に対して、当社が負担した金銭等を補償するものとします。ただし、当社の責に帰すべき事由による場合を除きます。</p>
            <p>附則</p>
            <p>本規約は、令和３年１月1日より施行致します。</p>
        </article>
    </div>
</section>
@endsection
