{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">



<style type="text/css" data-premailer="ignore">
  #outlook a{
    padding: 0;
  }
  body{
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
    font-weight: 400;
    margin: 0;
    padding: 0;
  }
  .ReadMsgBody{
    width: 100%;
  }
  .ExternalClass{
    width: 100%;
  }
  img {
    border: 0;
    max-width: 100%;
    height: auto;
    outline: none;
    display: inline-block;
    margin: 0;
    padding: 0;
    text-decoration: none;
    line-height: 100%;
  }
  #backgroundTable{
    height: 100% !important;
    margin: 0;
    padding: 0;
    width: 100% !important;
  }
</style>




<style type="text/css">
  /**
   * Generic
   */

  .main {
    font-family: Helvetica, Arial, sans-serif;
    letter-spacing: 0;
  }

  table {
    border-spacing: 0;
    border-collapse: separate;
    table-layout: fixed;
  }

  td {
    font-size: 16px;
    padding: 0;
    font-family: Helvetica, Arial, sans-serif;
  }

  a {
    border: none;
    outline: none !important;
  }


  /**
   * Header
   */

  .header td img{
    padding: 0 0 37px;
  }

  .header .logo {
    text-align: center;
  }

  /**
   * Content
   */

  .content .content-td {
    line-height: 150%;
    color: #818181;
    padding: 0 0 60px;
  }

  .content .content-td > :first-child {
    margin-top: 0;
  }

  .content .content-td > :last-child {
    margin-bottom: 0;
  }

  .content h1 {
    font-size: 36px;
    font-weight: 300;
    line-height: 1.2;
    margin: 30px 0 5px;
    color: #3090f0 !important;
  }

  .content h1 a {
    color: #3090f0 !important;
  }

  .content-td h1 + h2 {
    margin-top: 0px !important;
  }

  .content-td h2 + h1 {
    margin-top: 0px !important;
  }

  .content h2 {
    font-size: 21px;
    font-weight: bold;
    color: #303030;
    line-height: 1.25;
    margin: 30px 0 5px;
  }

  .content h2 a {
    color: #303030;
  }

  .content-td h3 ,
  .content-td h4 ,
  .content-td h5 {
    font-size: 16px;
    font-weight: bold;
    margin: 20px 0 10px;
  }

  .content p {
    font-size: 16px;
    margin: 0 0 13px 0;
  }

  .content p.intro {
    font-size: 18px;
    color: #5d6678;
    margin: 40px 0 50px;
  }

  .content a {
    color: #178acc;
    text-decoration: underline;
  }

  .content strong,
  .content b {
    color: #606060;
  }

  .content ol,
  .content ul {
    margin: 20px 0 30px 0;
    padding: 0;
  }


  .content ol li,
  .content ul li {
    margin: 5px 0;
  }

  .content blockquote {
    padding: 15px 40px;
    margin: 20px 15px;
    font-style: italic;
    color: #8C8C8C;
    font-size: 17px;
    text-align: center;
    font-family: Georgia, sans-serif;
  }

  .content blockquote a {
    color: #8C8C8C;
  }

  .content td.content-td table.intercom-container {
    margin: 18px 10%;
  }
  .content td.content-td table.intercom-container.intercom-align-center {
    margin-left: auto;
    margin-right: auto;
  }

  .content td.content-td table.intercom-container td {
    background-color: #3090f0;
    padding: 13px 35px;
    border-radius: 26px;
    font-family: Helvetica, Arial, sans-serif;
    margin: 0;
    border: none;
  }

  .content td.content-td table.intercom-container .intercom-h2b-button {
    display: inline-block;
    min-height: 20px;
    color: white;
    font-size: 15px;
    text-decoration: none;
    background-color: #3090f0;
    border: none !important;
  }

  hr {
    border: none;
    border-top: 1px solid #F0F0F0;
    border-bottom: 0;
    margin: 50px 60px;
  }

  .content table th {
    font-weight: bold;
    background: #F6F6F6;
  }

  .content table td,
  .content table th {
    padding: 7px 10px;
    border: 1px solid #DADADA;
    text-align: left;
    vertical-align: top;
  }

  .content .content-td table {
    margin: 40px 0 20px;
    border-collapse: collapse;
  }

  .content td.content-td .im {
    display: block;
  }

  /* Star (> *) selector breaks outlooks :( */
  .content td.content-td h1 ,
  .content td.content-td h2 ,
  .content td.content-td h3 ,
  .content td.content-td h4 ,
  .content td.content-td h5 ,
  .content td.content-td p ,
  .content td.content-td ol ,
  .content td.content-td ul ,
  .content td.content-td .intercom-container ,
  .content td.content-td blockquote ,
  .content td.content-td table ,
  .content td.content-td img ,
  .content td.content-td hr {
    padding-left: 10%;
    padding-right: 10%;
  }

  .content td.content-td table {
    padding: 0;
    margin-left: 10%;
    margin-right: 10%;
  }

  .content td.content-td blockquote {
    padding-left: 50px;
    padding-right: 50px;
    margin-left: 50px;
    margin-right: 50px;
  }

  .content td.content-td ol ,
  .content td.content-td ul {
    padding-left: 16%;
  }

  .content td.content-td img {
    max-width: 100%;
    margin: 13px 0;
    padding: 0;
  }

  .content td.content-td p img,
  .content td.content-td h1 img,
  .content td.content-td h2 img,
  .content td.content-td li img,
  .content td.content-td .intercom-h2b-button img {
    margin: 0;
    padding: 0;
  }

  .content td.content-td .intercom-container.featured {
    margin-left: 0;
    margin-right: 0;
    padding: 0;
  }


  /**
   * Footer
   */

  .footer {
    background: #f8f8f8;
    max-width: 800px;
  }

  .footer .footer-td {
    text-align: center;
    width: 100%;
    padding: 26px 30px 22px;
  }

  .footer h2,
  .footer p,
  .footer a {
    text-decoration: none;
    font-size: 13px;
    color: #a8a8a8;
  }

  .footer h2 {
    font-weight: bold;
  }

  .footer p {
    margin: 0 0 10px 0;
    line-height: 1.5;
    font-weight: 300;
  }

  .footer .unsub {
    margin: 0;
  }

  .footer .unsub a {
    text-decoration: underline;
  }

  .footer .powered-by {
    display: block;
    margin: 10px 0 10px;
  }

  .footer .powered-by a{
    font-weight: bold;
  }

  .footer .social {
    margin: 27px 0 20px;
  }

  a.intercom-h2b-button {
    background-color: #3090f0;
    border-radius: 26px;
    display: inline-block;
    min-height: 20px;
    color: white !important;
    font-size: 15px;
    text-decoration: none !important;
    
  }

</style>


<style type="text/css" data-premailer="ignore">

  @media screen and (max-width: 600px) {
    .main {
      width: 100% !important;
    }
  }

  @media screen and (max-width: 480px) {
    .content td.content-td h1 ,
    .content td.content-td h2 ,
    .content td.content-td h3 ,
    .content td.content-td h4 ,
    .content td.content-td h5 ,
    .content td.content-td p ,
    .content td.content-td ol ,
    .content td.content-td ul ,
    .content td.content-td .intercom-container ,
    .content td.content-td blockquote ,
    .content td.content-td table ,
    .content td.content-td hr {
      padding-left: 5% !important;
      padding-right: 5% !important;
    }

    .content td.content-td ol ,
    .content td.content-td ul {
      padding-left: 15% !important;
    }

    .content td.content-td table {
      margin-left: 5% !important;
      margin-right: 5% !important;
    }

    .content td.content-td table[align=center] {
      margin: 18px auto !important
    }

    .content td.content-td .intercom-container.featured {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .content td.content-td blockquote {
      padding-left: 10% !important;
      padding-right: 10% !important;
      margin-left: 0 !important;
      padding-right: 0 !important;
    }

    .content h1 {
      font-size: 30px !important;
      margin: 30px 0 0 !important;
    }

    .content h2 {
      font-size: 20px !important;
    }

    .content p,
    .content li,
    .content b,
    .content i,
    .content strong,
    .content em,
    .content h3 {
      font-size: 14px !important;
    }

    .content p.intro {
      font-size: 16px !important;
      margin-top: 30px !important;
      margin-bottom: 30px !important;
    }

    .footer .footer-td-wrap {
      padding-left: 20px !important;
      padding-right: 20px !important;
    }
  }

  .content-td blockquote + * {
    margin-top: 20px !important;
  }

  .ExternalClass .content h1 {
    padding: 30px 0 15px !important;
  }

  .ExternalClass .content h2 {
    padding: 15px 0 !important;
  }

  .ExternalClass .content-td p {
    padding: 10px 0 !important;
  }

  .ExternalClass .intercom-container {
    padding: 10px 0 !important;
  }

  .ExternalClass .content-td hr + * {
    padding-top: 20px !important;
  }

  .ExternalClass .content ol ,
  .ExternalClass .content ul {
    padding: 20px 0 20px 40px !important;
    margin: 0 !important;
  }

  .ExternalClass .content ol li,
  .ExternalClass .content ul li {
    padding: 3px 0 !important;
    margin: 0 !important;
  }

  .ExternalClass .footer h2 {
    padding-bottom: 5px !important;
  }

  .ExternalClass .footer p {
    padding: 10px 0 !important;
  }

</style>






<style type="text/css">
  .intercom-align-right {
  text-align: right !important;
}
.intercom-align-center {
  text-align: center !important;
}
.intercom-align-left {
  text-align: left !important;
}
/* Over-ride for RTL */
.right-to-left .intercom-align-right{
  text-align: left !important;
}
.right-to-left .intercom-align-left{
  text-align: right !important;
}
.right-to-left .intercom-align-left {
  text-align:right !important;
}
.right-to-left li {
  text-align:right !important;
  direction: rtl;
}
.right-to-left .intercom-align-left img,
.right-to-left .intercom-align-left .intercom-h2b-button {
  margin-left: 0 !important;
}
.intercom-attachment,
.intercom-attachments,
.intercom-attachments td,
.intercom-attachments th,
.intercom-attachments tr,
.intercom-attachments tbody,
.intercom-attachments .icon,
.intercom-attachments .icon img {
  border: none !important;
  box-shadow: none !important;
  padding: 0 !important;
  margin: 0 !important;
}
.intercom-attachments {
  margin: 10px 0 !important;
}
.intercom-attachments .icon,
.intercom-attachments .icon img {
  width: 16px !important;
  height: 16px !important;
}
.intercom-attachments .icon {
  padding-right: 5px !important;
}
.intercom-attachment {
  display: inline-block !important;
  margin-bottom: 5px !important;
}

.intercom-interblocks-content-card {
  width: 334px !important;
  max-height: 136px !important;
  max-width: 100% !important;
  overflow: hidden !important;
  border-radius: 20px !important;
  font-size: 16px !important;
  border: 1px solid #e0e0e0 !important;
}

.intercom-interblocks-link,
.intercom-interblocks-article-card {
  text-decoration: none !important;
}

.intercom-interblocks-article-icon {
  width: 22.5% !important;
  height: 136px !important;
  float: left !important;
  background-color: #fafafa !important;
  background-image: url('https://static.intercom-mail-200.com/assets/article_book-1a595be287f73c0d02f548f513bfc831.png') !important;
  background-repeat: no-repeat !important;
  background-size: 32px !important;
  background-position: center !important;
}

.intercom-interblocks-article-text {
  width: 77.5% !important;
  float: right !important;
  background-color: #fff !important;
}

.intercom-interblocks-link-title,
.intercom-interblocks-article-title {
  color: #519dd4 !important;
  font-size: 15px !important;
  margin: 16px 18px 12px !important;
  line-height: 1.3em !important;
  overflow: hidden !important;
}

.intercom-interblocks-link-description,
.intercom-interblocks-article-body {
  margin: 0 18px 12px !important;
  font-size: 14px !important;
  color: #65757c !important;
  line-height: 1.3em !important;
}

.intercom-interblocks-link-author,
.intercom-interblocks-article-author {
  margin: 10px 15px !important;
  height: 24px !important;
  line-height: normal !important;
}

.intercom-interblocks-link-author-avatar,
.intercom-interblocks-article-author-avatar {
  width: 16px !important;
  height: 16px !important;
  display: inline-block !important;
  vertical-align: middle !important;
  float: left;
  margin-right: 5px;
}

.intercom-interblocks-link-author-avatar-image,
.intercom-interblocks-article-author-avatar-image {
  width: 16px !important;
  height: 16px !important;
  border-radius: 50% !important;
  margin: 0 !important;
  vertical-align: top !important;
  font-size: 12px !important;
}

.intercom-interblocks-link-author-name,
.intercom-interblocks-article-author-name {
  color: #74848b !important;
  margin: 0 0 0 5px !important;
  font-size: 12px !important;
  font-weight: 500 !important;
  overflow: hidden !important;
}

.intercom-interblocks-article-written-by {
  color: #8897a4 !important;
  margin: 1px 0 0 5px !important;
  font-size: 12px !important;
  overflow: hidden !important;
  vertical-align: middle !important;
  float: left !important;
}

.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}


</style>

</head>

<body style="background-color: white; margin: 0px" bgcolor="white">

  <table cellspacing="0" border="0" cellpadding="0" align="center" width="600" bgcolor="transparent" class="main" style="border-collapse: separate; border-spacing: 0; font-family: Helvetica, Arial, sans-serif; letter-spacing: 0; table-layout: fixed; background-color: gainsboro">
    <tr>
      <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; padding: 10px 0 0">

        
        
  <table width="100%" class="header" style="border-collapse: separate; border-spacing: 0; table-layout: fixed; padding: 0px !important;">
    <tr>
      <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; padding: 0; text-align: center; position: relative; bottom: -30px;" align="center">
        
          <img src="https://photodesignexpert.com/assets/img/logo.png" width="77" height="85" class="featured" style="padding: 0 0 37px; vertical-align: center !important;">
        
      </td>
    </tr>
  </table>

  <table width="100%" class="header" style="border-collapse: separate; border-spacing: 0; table-layout: fixed; padding: 0px !important;">
    <tr>
      <td style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; padding: 0; text-align: center" align="center">
        
          <strong>Welcome!!!</strong>
        
      </td>
    </tr>
  </table>


        
        <table width="100%" class="content" style="border-collapse: separate; border-spacing: 0; table-layout: fixed">
          <tr>
            <td class="content-td" style="color: #818181; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 150%; padding: 0 0 60px">
              
                <div class="intercom-container intercom-align-left" style="margin-top: 0; padding-left: 10%; padding-right: 10%; text-align: left !important" align="left">
                    <img src="https://i.pinimg.com/originals/bd/9b/4e/bd9b4e222885a996ed309a4a50eb1fd8.gif" style="margin: 13px 0; max-width: 100%; padding: 0">
                </div>
                <p class="intercom-align-left" style="font-size: 16px; margin: 0 0 5px; padding-left: 10%; padding-right: 10%; text-align: left !important" align="left">
                    <b style="color: #606060">Hello,</b>
                    {{-- <img src="https://lh3.googleusercontent.com/proxy/Bm4Xrk2GyoJYUW_VHzAUAvsI2RyZWDvPUfzRWlexMuam3mGgbppQcIvwu8PgVSIJlJT_tzqJBDKj-U3ukVmGCKlTH0Qonto" width="16" height="16" alt="gift" class="ic_emoji_img" style="margin: 0; min-height: 16px; padding: 0; width: 30px; position:relative; top:4px;"> --}}
                    <br>
                    Thank you for registering in photodesignexpert. We are excited to have you. 
                    <br>
                    <strong style="font-size: 16px;">We have a surprise gift for you.</strong>
                </p>
                <p class="intercom-align-left" style="font-size: 16px; margin: 0 0 13px; padding-left: 10%; padding-right: 10%; text-align: left !important" align="left">
                </p>
                <p class="intercom-align-left" style="font-size: 16px; margin: 0 0 13px; padding-left: 10%; padding-right: 10%; text-align: left !important" align="left">
                    Please verify your email first.
                </p>

                <table class="intercom-container intercom-align-center" align="center" style="border-collapse: collapse; border-spacing: 0; margin: 18px auto; padding: 0 10%; table-layout: fixed; text-align: center !important">
                    <tr>
                        <td style="background-color: #3090f0; border: 1px none #dadada; border-radius: 26px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; margin: 0; padding: 13px 35px; text-align: left; vertical-align: top" align="left" bgcolor="#3090f0" valign="top">
                            <a class="intercom-h2b-button" target="_blank" href="{{ $actionUrl }}" style="background-color: #3090f0; border: none; border-radius: 26px; color: white !important; display: inline-block; font-size: 15px; min-height: 20px; outline: none !important; text-decoration: none !important">
                              {{$actionText}}
                            </a>
                        </td>
                    </tr>
                </table>
              
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>

  
  
    <table cellspacing="0" border="0" cellpadding="0" align="center" width="100%" bgcolor="transparent" class="main footer" style="background-color: #f8f8f8; width: 600px; border-collapse: separate; border-spacing: 0; font-family: Helvetica, Arial, sans-serif; letter-spacing: 0; max-width: 800px; table-layout: fixed">
      <tr>
        <td class="footer-td" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; padding: 26px 30px 22px; text-align: center; width: 100%" align="center">
          
  <h2 style="color: #a8a8a8; font-size: 13px; font-weight: bold; text-decoration: none; text-align: center;">Follow us</h2>
  <p class="social" style="color: #a8a8a8; font-size: 13px; font-weight: 300; line-height: 1.5; margin: 27px 0 20px; text-decoration: none">
    
      <a href="https://www.facebook.com/photodesignexpert24/" style="border: none; color: #a8a8a8; font-size: 13px; outline: none !important; text-decoration: none"><img alt="Facebook" src="https://marketing.intercom-mail-200.com/assets/email/broadcast/facebook-2263526f2b7c7cf3c7c2a066588b01ef.png" width="60"></a>
    
    
      <a href="https://twitter.com/PhotoDesignExp1" style="border: none; color: #a8a8a8; font-size: 13px; outline: none !important; text-decoration: none"><img alt="Twitter" src="https://marketing.intercom-mail-200.com/assets/email/broadcast/twitter-fe222f8697fa267d095338db3f583c94.png" width="60"></a>
    
  </p>


          
    <p style="color: #a8a8a8; font-size: 13px; font-weight: 300; line-height: 1.5; margin: 0 0 10px; text-decoration: none">
        <a href="https://photodesignexpert.com">photodesignexpert.com</a>
    </p>

        </td>
      </tr>
    </table>
  
{{-- <img src="https://via.intercom-mail-200.com/o?h=b050c32ae5e39d273da761b33dd39e267fe7d5a4-13038316923" width="1" height="1" style="display: block;" alt="intercom"> --}}


</body>
</html>
