$(function(){
    var dia1=parseInt(window.document.form1.dia.value);
    var mes1=parseInt(window.document.form1.mes.value);
    var ano1=parseInt(window.document.form1.ano.value);

    var datadigitada= new Date(ano1,(mes1-1),dia1);
     var miliqq=datadigitada.getTime();

     var mydate= new Date()
      var mili=mydate.getTime();

    var diaqq=parseInt(datadigitada.getDate());
    var mesqq=parseInt(datadigitada.getMonth())+1;

    if((dia1!=diaqq) || (mes1!=mesqq)){
        alert("Data inválida");
        window.document.form1.dia.focus();
        return false;
    }
    else if(miliqq > mili){
      alert("Data Digitada maior que data atual");
       window.document.form1.dia.focus();
       return false;
   }
});
