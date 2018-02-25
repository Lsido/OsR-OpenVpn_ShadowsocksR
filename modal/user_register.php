
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=$webdata['site_desc']?>" />
            <meta name="keywords" content="<?=$webdata['site_keyword']?>" />
    <title><?=$webdata['site_title']?></title>
   <!-- Bootstrap Core CSS -->
  	<script type="text/javascript" src="/static/assets/js/jquery-1.11.2.min.js"></script>
	
			<script type="text/javascript" src="/static/css/bootstrap.min.js"></script>
			<link href="/static/css/bootstrap.min.css" rel="stylesheet">

			<script type="text/javascript" src="/static/assets/js/bootbox.min.js"></script>

			<link href="/static/css/font-awesome.min.css" rel="stylesheet">
	
			<script src="/static/assets/js/whmcs.js"></script>
			<link href="/static/assets/css/whmcs.css" rel="stylesheet">

			<!-- Custom CSS -->
    			<link rel="stylesheet" href="/static/assets/css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond./static/css/1.4.2/respond.min.js"></script>
    <![endif]-->
						
			
		</head>
		<body>

			
			
				<header id="mainNav" class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/member/client" title="OS|Html"><img src="/static/images/icon.png" alt="OS|Html" id="navbar-logo" class="img-responsive"></a>
					</div>
					<nav class="collapse navbar-collapse" id="navbar-collapse-1" role="navigation">
						<ul class="nav navbar-nav navbar-left">
							<li><a  href="/member/client" title="首页"><?php echo $webdata['site_name']; ?></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a class="page-scroll" href="/member/client" title="首页">首页</a></li>
                                                        <li><a href="/member/shop">购买新服务</a></li>
                                                        <li><a href="/member/register">注册账户</a></li>
                                                        <li><a href="/member/pwreset">忘记密码/密码找回</a></li>
						</ul>
					</nav>
				</div>
			</header>

<section>
	<div class="container text-center">
		 
		
		<h2>注册</h2>
		<hr>
		
				
				
		<form action="/member/register" method="post" class="form-horizontal">
 
			<fieldset>
				 
				<div class="row text-center">
					<div class="col-md-6 col-md-offset-3">
		
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="firstname">名</label>
							<div class="col-md-8">
								<input type="text" name="firstname" id="firstname" value="Customer" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="lastname">姓</label>
							<div class="col-md-8">
								<input type="text" name="lastname" id="lastname" value="CloudSS" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="companyname">公司名称（个人请填写姓名）</label>
							<div class="col-md-8">
								<input type="text" name="companyname" id="companyname" value="CloudSS LLC." class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="email">电子邮件地址</label>
							<div class="col-md-5">
								<input type="email" name="username" id="email" value="" class="form-control" required>
							</div>
							<div class="col-md-3">
								<div class="help-block"></div>
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="phonenumber">电话号码</label>
							<div class="col-md-8">
								<input type="text" name="phonenumber" id="phonenumber" value="08618812345678" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="password">密码</label>
							<div class="col-md-5">
								<input type="password" name="password" id="password" value="" class="form-control" required>
							</div>
							<div class="col-md-3">
								<div class="help-block"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="password2">确认密码</label>
							<div class="col-md-5">
								<input type="password" name="password2" id="password2" value="" class="form-control" required>
								<input type="hidden" name="spread_id" value="<?=$_SESSION['spread_id']?>" class="form-control">
								 
								
							</div>
							<div class="col-md-3">
								<div class="help-block"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="safeid">安全码</label>
							<div class="col-md-5">
								<input type="text" name="safeid" id="safeid" value="" class="form-control" required>
							</div>
							<div class="col-md-3">
								<div class="help-block">用于找回密码</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="address1">联系地址</label>
							<div class="col-md-8">
								<input type="text" name="address1" id="address1" value="Street No.1" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="address2">地址（第二行）</label>
							<div class="col-md-8">
								<input type="text" name="address2" id="address2" value="Room 2046" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="city">城市</label>
							<div class="col-md-8">
								<input type="text" name="city" id="city" value="Guang Zhou" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="state">省</label>
							<div class="col-md-8">
								<input type="text" name="state" id="stateinput" value="Guang Dong" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="postcode">邮编</label>
							<div class="col-md-8">
								<input type="text" name="postcode" id="postcode" value="510000" class="form-control">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-md-4 control-label" for="country">国家</label>
							<div class="col-md-8">
								<select name="country" id="country" class="form-control"><option value="AF">Afghanistan</option><option value="AX">Aland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua And Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia And Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN" selected="selected">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, Democratic Republic</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island &amp; Mcdonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic Of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle Of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KR">Korea</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States Of</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestine, State of</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="BL">Saint Barthelemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre And Miquelon</option><option value="VC">Saint Vincent And Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia And Sandwich Isl.</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard And Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks And Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands, British</option><option value="VI">Virgin Islands, U.S.</option><option value="WF">Wallis And Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>
							</div>
						</div>
					</div>
				</div>
		
					
					
							<hr>
				<div class="form-group row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-body text-center">
								<h3>验证</h3>
								<p>请输入以下图片中的英文字母，该验证用于防止恶意注册.</p>
								<div class="text-center">
																		<div class="col-md-3 col-md-offset-3">
										<input type="text" name="captcha_img" class="form-control input-sm" maxlength="5">
									</div>
									<div class="col-md-6 text-left">
										<img src="/api/vicode.php?r=<?php echo rand(); ?>" name="captcha_img" alt="captcha" style="margin-bottom: 20px;">
										<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='/api/vicode.php?r='+Math.random()"> 换一个?</a>
									</div>
																	</div>
							</div>
						</div>
					</div>
				</div>
					 
					
					<div id="status">
					</div>
				<div class="text-center form-group">
					 
					<button type="submit" id="reg_submit" class="btn btn-lg btn-primary">注册</button>
				</div>
			</fieldset>
		</form>
				
		
		<script type="text/javascript">
		 
 
 
function RdelayURL() {window.location.href="clientarea.php";} 
			$(function() {
				$('#country').on('change', function() { $('#stateselect').addClass('form-control'); });
				 
				$('input[type=text]').addClass('form-control');
				$('select').addClass('form-control');
				 
				$('#password').keyup(function() {
					$(this).parent().parent().removeClass('has-warning has-error has-success');
					$(this).next().html("");
					if($(this).val().length == 0) {
						$(this).parent().next().children().html("");
						return;
					}
					var pwstrength = passwordStrength($(this).val());
					if(pwstrength > 75) {
						$(this).parent().parent().addClass("has-success");
						$(this).parent().next().children().html("安全（请您妥善保管您的密码）");
					} else if (pwstrength > 45) {
						$(this).parent().parent().addClass("has-warning");
						$(this).parent().next().children().html("一般（请尽量使用复杂密码以提高安全性）");
					} else {
						$(this).parent().parent().addClass("has-error");
						$(this).parent().next().children().html("弱（请尽量使用复杂密码以提高安全性）");
					}
					$('#password2').keyup();
				});
				 
				$('#password2').keyup(function() {
					$(this).parent().parent().removeClass('has-error has-success');
					$(this).next().html("");
					if($(this).val().length < 1) return;
					if($('#password').val() != $(this).val()) {
						$(this).parent().parent().addClass("has-error");
					} else {
						$(this).parent().parent().addClass("has-success");
					}
				});
				
				$('#email').keyup(function() {
					$(this).parent().parent().removeClass('has-error has-success');
					var emailValue = document.getElementsByName("email")[0].value;  
					if(emailValue.indexOf("@") == -1){  
              
						$(this).parent().parent().addClass("has-error");
						$(this).parent().next().children().html("请输入正确的邮箱");
						}else{  
						$(this).parent().parent().addClass("has-success");
						$(this).parent().next().children().html("OK");
							}  
				});
				
 
			});
		</script>
		
	</div>
</section>





		<footer id="whmcs-footer">
			<div class="container">
								<p class="text-center text-muted">Copyright &copy; 2017 <?=$webdata['site_title']?>. All Rights Reserved.</p>
			</div>
		</footer>
		
	</body>
	  <!-- jQuery -->
   
  

    <!-- Bootstrap Core JavaScript -->
    <script src="/static/css/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/static/css/jquery.easing.min.js"></script>
    <script src="/static/css/jquery.fittext.js"></script>
    <script src="/static/css/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/static/css/creative.js"></script>

</html>