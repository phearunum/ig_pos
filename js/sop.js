/*$(document).ready(function() {
  const pk="not use";
  const nk="hezDo7as1c9FecrNXIsGMCm7lwjROQAhjQuuVWQynBOPhnrndSF92OO81m25FiXkLTdX8uI70jeXXmBOviW2OA==";
  $.ajax({
         type: 'POST',
         url: site_url+"/sop/check",
         async: false,
         data:{'pk':pk,'nk':nk},
         success: function (response){
           var result = JSON.parse(response);
           if(result<=0){
             $("body").html('<h1 style="text-align:center; color:red;font-weight:bold;">SOP SYSTEM<br><br>PLEASE CONTACT US.<br>YOUR SYSTEM HAS BEEN EXPIRED!!!<br>សូមប្រញាប់ទាក់ទងមកកាន់យើងខ្ញុំ ពេលនេះប្រព័ន្ធបានផុតកំណត់ហើយ!!!</h1>');
             $("body").css('background','white');
           }else if(result<=7){
             alert("YOUR SYSTEM WILL EXPIRE ON NEXT "+result+" DAYS!!!<br>សូមប្រញាប់ទាក់ទងមកកាន់យើងខ្ញុំ ប្រព័ន្ធជិតផុតកំណត់ហើយ!!!");
           }
         },
         error: function (response){
            $("body").html('<h1 style="text-align:center; color:red;font-weight:bold;">SOP SYSTEM<br><br>PLEASE CONTACT US.<br>YOUR SYSTEM HAS BEEN EXPIRED!!!<br>សូមប្រញាប់ទាក់ទងមកកាន់យើងខ្ញុំ ពេលនេះប្រព័ន្ធបានផុតកំណត់ហើយ!!!</h1>');
            $("body").css('background','white');
         }
     });
});*/
