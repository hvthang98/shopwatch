<!DOCTYPE html>
<html>
<head>
      <title>Đăng nhập</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" type="text/javascript"></script>
      <style type="text/css">
            *{
                  margin:0px;
                  padding: 0px;
                  text-decoration: none;
                  font-family: montserrat;
                  box-sizing: border-box;
            }
            body{
                  min-height: 100vh;
                  background-image: linear-gradient(120deg,#3498db,#8e44ad);
            }
            .login-form{
                  width: 400px;
                  background: #f1f1f1;
                  min-height: 580px;
                  padding: 80px 40px;
                  border-radius: 10px;
                  position: absolute;
                  left: 50%;
                  top:50%;
                  transform: translate(-50%,-50%);
            }
            .login-form h1{

                  text-align: center;
                  margin-bottom: 40px;
            }
            .txtb{
                  border-bottom: 2px solid #adadad;
                  position: relative;
                  margin: 20px 0; 
            }
            .txtb input{
                  font-size: 15px;
                  color: #333;
                  border:none;
                  width:100%;
                  outline: none;
                  background:none;
                  padding: 0 5px;
                  height: 40px;

            }
            .txtb input {
                  font-size: 15px;
                  color: #333;
                  border:none;
                  width:100%;
                  outline: none;
                  background:none;
                  padding: 0 5px;
                  height: 40px;

            }
            .txtb span::before{
                  content:attr(data-placehoder);
                  position:absolute;
                  top:50%;
                  left:5px;
                  color:#adadad;
                  transform: translateY(-50%);
                  z-index: -1;
                  transition: .5s;
            }
            .txtb span ::after{
                  content: '';
                  position: absolute;
                  width:0%;
                  height: 2px;
                  background: linear-gradient(120deg,#3498db,#8e44ad);
                  transition: .5s;

            }
            .focus +span::before{
                  top:-5px;
            }
            .focus +span::after{
                  width: 100%;
            }
            .logbtn{
                  display: block;
                  width: 100%;
                  height: 50px;
                  border: none;
                  background: linear-gradient(120deg,#3498db,#8e44ad,#3498db);
                  background-size: 200%;
                  color:#fff;
                  outline: none;
                  cursor: pointer;
                  transition: .5s;
            }
            .logbtn:hover{
                  background-position: right;
            }
            .mk{
                  margin-left: 230px;
                  margin-top: 10px;
                  font-size: 15px;
            }
            .bottom-text{
                  margin-top: 40px;
                  text-align: center;
                  font-size: 15px;
            }

      </style>
</head>
<body>
      <div class="login">
    <div class="wrap">
        <div class="col_1_of_login span_1_of_login">
            <div class="login-title">
                
                <div id="loginbox" class="loginbox">
                    <form action="{{route('post-user-signup')}}" method="post" name="login" class="login-form">
                        <h1 class="title">Đăng ký tài khoản</h1>
                        @csrf
                        @if(count($errors)>0)
                        <div>
                             <strong style="color: red">{{$errors->first()}}</strong>
                        </div>
                        @endif
                        <div class="txtb">
                              <input type="text" name="name">
                              <span data-placehoder="Tên người dùng"></span>
                        </div>
                        <div class="txtb">
                              <input type="date" name="birthday">
                              <span data-placehoder="Ngày sinh"></span>
                        </div>
                        <div class="txtb">
                              <input type="email" name="email">
                              <span data-placehoder="Email"></span>
                        </div>
                        <div class="txtb">
                              <input type="password" name="password">
                              <span data-placehoder="Mật khẩu"></span>
                        </div>
                        <div class="txtb">
                              <input type="password" name="password_confirmation">
                              <span data-placehoder="Nhập lại mật khẩu"></span>
                        </div>
                        <div class="txtb">
                              <input type="text" name="address">
                              <span data-placehoder="Địa chỉ"></span>
                        </div>
                        <div class="txtb">
                              <input type="text" name="phonenumber">
                              <span data-placehoder="Số điện thoại"></span>
                        </div>
                        <input type="submit" class="logbtn" name="signup" value="Đăng ký">
                        
                        <div class="mk"><a href="{{route('index')}}">Về trang chủ</a></div> 
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
</div>
<script type="text/javascript">
          $(".txtb input").on("focus",function(){
            $(this).addClass("focus");});

          $(".txtb input").on("blur",function(){
            if($(this).val()=="")
            $(this).removeClass("focus");
          });
    </script>
</body>
</html>




<!-- <div class="register_account">
    <div class="wrap">
        <h4 class="title">Đăng ký tài khoản</h4>
        <form action="{{route('post-user-signup')}}" method="POST" name="signup">
            @csrf
            <div class="col_1_of_2 span_1_of_2">
                <div><input type="text" name="name" placeholder="Họ và tên" require></div>
                <div><input type="date" name="birthday" placeholder="Năm sinh" require></div>
                <div><input type="text" name="email" placeholder="E-mail" require></div>
                <div><input type="password" name="password" placeholder="Mật khẩu" require></div>
                <div><input type="password" name="repassword" placeholder="Nhập lại mật khẩu" require></div>
            
                <div><input type="text" name="address" placeholder="Địa chỉ" require></div>
                <div><input type="text" name="phonenumber" placeholder="Số điện thoại" require></div>
                
                <input  type="submit" class="grey" value="Đăng ký">
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div> -->


<!-- <div><select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">Select a Country</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua And Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, Democractic Republic</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
                        <option value="HR">Croatia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TP">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Islas Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji Islands</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="FX">France, Metropolitan</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia, The</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and McDonald Islands</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong S.A.R.</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KR">Korea</option>
                        <option value="KP">Korea, North</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau S.A.R.</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua new Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Island</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="SH">Saint Helena</option>
                        <option value="KN">Saint Kitts And Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent And The Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                    </select>
                </div> -->
                <!-- <input type="text" value="" class="code"> - <input type="text" value="" class="number"> -->
                <!-- <p class="code">Country Code + Phone Number</p> -->