@extends('web.layouts.wrapper')
@section('main')
    {{-- 上五格圖片置入 --}}
    <div class="kv">
        @foreach($banners as $banner)
            <div>
                <img src="{{ asset($banner->image_src) }}" alt="{{ $banner->alt }}">
            </div>
        @endforeach
    </div>
    <div class="main_infor">
        <div>
            <img src="{{asset('imgs/logo.png')}}" style="width: 20%;height: 30%;">
        </div>
        {{-- 表單 --}}
        <div class="contact">
            <div class="container">
                {{-- 左 --}}
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img id="infor_icon" src="{{asset('imgs/icon.png')}}" alt="青埔站前特區，森Plaza">
                        <p id="infor_txt"> 青埔站前特區 森態超級商辦 <br>80-550坪｜02-8522-8585</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <p id="contact_txt">欲知最新資訊，請留下聯絡方式，將由服務顧問親洽聯繫</p>
                        </div>
                        {{-- 中 --}}
                        <div style="height: auto;">
                            <form class="form" method="POST" action="{{ route('api.post.store') }}" data-js="post-form">
                                <div class="form-group row infor_input">
                                    <label for="inputName" class="col-sm-3 col-form-label col-txt">您的姓名</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="name" name="name" placeholder="請留下正確姓名，以利後續聯繫" style="border-radius: 0px;background-color: #E6E6E6;">
                                    </div>
                                </div>
                                <div class="form-group row infor_input">
                                    <label for="inputPhone" class="col-sm-3 col-form-label col-txt">連絡電話</label>
                                    <div class="col-sm-9">
                                        <input type="" class="form-control" id="phone" name="phone" style="border-radius: 0px;;background-color: #E6E6E6;">
                                    </div>
                                </div>

                                <div class="form-group row mb-2 infor_input">
                                    <label for="inputEmail" class="col-sm-3 col-form-label col-txt">電子信箱</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email" name="email" style="border-radius: 0px;;background-color: #E6E6E6;">
                                    </div>
                                    <div id="btn-send" class="col-sm-2">
                                        <input type="hidden" id="url" name="url" value="">
                                        <button type="submit" class="btn btn-primary" id="btn-sumit" data-js="form-submit">送出</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- 右 --}}
                <div class="col-12 col-md-4" style="margin-top: 5%; padding-left: 2%; justify-content: center;">
                    <a href="https://line.me/R/ti/p/@ivn2950o"> <button type="button" class="btn btn-lg btn-more" style="margin-top: 3.5%;background-color: #3E3A39;color: white;">更多資訊</button></a>
                    <a href="https://www.homeplusone.com.tw/51549b60-ee8e-11eb-b57c-91a3ea7b6909" type="button" class="btn btn-lg btn-more" id="btn-right" style="margin-top: 3.5%;background-color: #A47130;color: white;">新莊副都心<br>寰宇1號</a>
                    <br>
                    <a href="https://instagram.com/chungyuet_group"> <button type="button" class="btn btn-lg btn-more" style="margin-top: 2%;background-color: #3E3A39;color: white;">中悦IG</button></a>
                    <a type="button" class="btn btn-lg btn-more" id="btn-right" style="margin-top: 2%;background-color: #A47130;color: white;">桃園經國<br>恆ONE</a>
                </div>
                {{-- <div class="col-6 col-md-4 btn-group" role="group" style="margin-top: 5%;">
                  <div>
                    <a  class="btn-more" href="https://lin.ee/04ab1Wv" ><img src="{{asset('imgs/A.png')}}"></a>
                    <a  class="btn-more disabled "href="#" role="button"><img src="{{asset('imgs/B.png')}}"></a>
                    <br>
                    <a  class="btn-more" href="https://reurl.cc/jG7VD2"><img src="{{asset('imgs/C.png')}}"></a>
                    <a  class="btn-more disabled" href="#" role="button"><img src="{{asset('imgs/D.png')}}"></a>
                  </div>
                </div> --}}
            </div>
        </div>
        {{-- 聲明 --}}
        <div class="claim">
            <div class="claim-txt">
                <hr>
                <p class="claim-txt" style="margin-left: 0px;">
                    隱私保護聲明
                </p>
                <h6 class="claim-subtitle">一、個人資料之蒐集目的與類別</h6>
                <p class="claim-txt">
                    <li>
                        本公司將因您購買本公司相關產品或使用本公司透過電話、網站、人員或其他方式所提供的服務、於本公司留言板留言、或加入本公司徵才活動，而取得您的個人資料；基於對當事人權益的尊重，本公司將不會以不合理或不合法的方式蒐集、取得您的個人資料。
                    <li>為了提供您全方位的會員訊息及售後服務，我們將會依服務內容請您提供以下的個人資料，包括：
                        基本資料：包括姓名、出生年月日、身分證統一編號、電話、地址及電子郵件信箱等資料。
                    <li>當您使用本公司電話、網站、人員或其他方式所提供的服務，為了提供您全方位的服務、優惠資訊或行銷訊息，我們將會請您提供的您的基本個人資料，包括姓名、出生年月日、身分證統一編號、電話、地址及電子郵件信箱等。
                    <li>當您使用公司留言板時，為了更進一步瞭解您的問題與需求，以及便於和您聯絡，我們將會請您提供您的個人基本資料，包括姓名、出生年月日、身分證統一編號、電話、地址及電子郵件信箱等。
                <li>當您使用本公司電話、網站、人員或其他方式所提供的服務，為了提供您全方位的服務、優惠資訊或行銷訊息，我們將會請您提供的您的基本個人資料，包括姓名、出生年月日、身分證統一編號、電話、地址及電子郵件信箱等。
                </p>

                <h6 class="claim-subtitle">二、個人資料利用之期間、地區、對象及方式</h6>
                <p>
                    <li>我們將依照您提供個人資料予本公司之目的處理或利用您的個人資料，除非取得您的書面同意、依法律規定或為契約履行之緣故，本公司絕不會將您的個人資料作其他用途使用。
                    <li>就您個人資料的利用期間，本公司將依照相關法令規定，以及您與本公司往來之契約或書面約定辦理。
                    <li>您的個人資料將使用於中華民國領域內，或因業務需要，在符合本公司所定之資訊安全標準的情況下傳輸至其他國家，惟國際傳輸之作業，將會依照我國及接受國之法規規範辦理。
                    <li>
                        您的個人資料，本公司將依照個人資料保護法、個人資料保護法施行細則等一切相關法令規定，以及您與本公司往來之契約或書面約定辦理。除法律規定、委任第三人處理營業相關事務，或與您的往來契約或書面文件另有約定，而須揭露您的個人資料予第三人外，將不會向任何其他第三人揭露或供其使用。
                <li>公務機關因公共利益或法律規定，要求本公司公開特定個人資料時，本公司將視公務機關合法正式的程序，以及對本公司所有使用者安全之考量下，做可能必要的配合。
                </p>

                <h6 class="claim-subtitle">三、個人資料之安全維護</h6>
                <p class="claim-txt">
                    <li>您的個人資料會被安全地保存在本公司的資料庫系統或管制區域中。同時，任何人均須在本公司訂定之資料授權管理規範下，進行資料之取得與使用，而不在授權範圍內之任何人，均不得亦無法取得資料。
                    <li>對您提供之個人資料，本公司將依法定保存期限為妥當之保護，避免遺失或未經授權之使用、刪除、修改、再處理或公開。
                <li>本公司以符合法規規範之實體、電子、流程安全標準來處理您的個人資料。本公司並訓練員工，以適當的處理方式來處理您的個人資料。當本公司委由其他公司提供服務時，亦會要求該公司對因此所取得之個人資料予以保密、保護，並符合一切法規規範。
                </p>

                <h6 class="claim-subtitle">四、客戶拒絕提供個人資料之權益影響</h6>
                <p class="claim-txt" style="margin-left: 0px;">
                    如果您不願意將您的個人資料予提供給本公司，將會影響到您取得本公司產品或服務之完整性。 </p>

                <p style="margin-bottom: 0px;padding-bottom: 3%;">
                    本隱私權政策自2019 年7月22日起開始生效，惟為因應社會環境及法令的變遷與科技的進步，並為保護客戶隱私，本公司有權隨時修改本公告政策，並將儘速於更新後公告或通知。
                </p>
            </div>
        </div>
    </div>
    {{-- loading --}}
    <div class="loadingdiv" id="loading" style="display: none">
        <img src="{{asset('imgs/loading.gif')}}">
    </div>
@endsection
