var app = angular.module('app',[]);

app.factory('weappservice', function($http)
{
    var baseUrl = 'services/';

    return{

        getLogin(item)
        {
            return $http.post(baseUrl+'getLogin.php',{'username': item.username, "password": item.password});
        },
        getTabs(item)
        {
            return $http.post('../'+baseUrl+'getTabs.php',{'user_leval': item});
        },
        getElencoBuoni()
        {
            return $http.get('../'+baseUrl+'getElencoBuoni.php');
        },
        getInformazioniCarnet()
        {
            return $http.get('../'+baseUrl+'getInformazioniCarnet.php');
        },
        setNuovaTessera(item)
        {
            return $http.post('../'+baseUrl+'setNuovaTessera.php',{ 'barcode': item.barcode,  'nome': item.nome,"cognome":item.cognome,"indirizzo":item.indirizzo,"civico":item.civico,"comune":item.comune,"cap":item.cap,"prv":item.prv,"nascita":item.nascita,"sesso":item.sesso,"telefono":item.telefono,"mobile":item.mobile,"email":item.email,"privacy":item.privacy,"privacy1":item.privacy1});
        }

    }

});


app.controller('loginCtrl', function($scope,weappservice){


    $scope.login = function(info)
    {
        weappservice.getLogin(info).then(function(data)
        {
            if(data.data === 'false')
            {
                location.href="index.php";  
            }else{
               location.href="accounts/index.php";
            }
              
            
            
            //location.href="accounts/index.php";
            
        });
        
    }

});


app.controller('formCtrl', function($scope,weappservice){


    $scope.$watch('user_leval', function()
    {  

       weappservice.getTabs($scope.user_leval).then(function(data){
           $scope.tabs = data;
       })
    });


    $scope.setTab = function(newTab){
       // console.log(newTab);
        $scope.tab = newTab;
    };

        $scope.isSet = function(tabNum){
        return $scope.tab === tabNum;
        };


       

});


app.controller('searchCtrl', function($scope,weappservice){

    init();

    function init()
    {
        weappservice.getElencoBuoni().then(function(data){
            $scope.items = data;
        });

        weappservice.getInformazioniCarnet().then(function(data){
            $scope.carnets = data;
        });
        
    }


});



app.controller('nuovaTesseraCtrl', function($scope,weappservice){
    
    $scope.nuovaTessera = function(item)
    {
      
        console.log(item);
        if(typeof(item) !== "undefined" && item !== null )
        {
                if(
                    (typeof (item.barcode) !== "undefined" && item.barcode !== null) &&
                    (typeof (item.nome) !== "undefined" && item.nome !== null) &&
                    (typeof (item.cognome) !== "undefined" && item.cognome !== null) &&
                    (typeof (item.indirizzo) !== "undefined" && item.indirizzo !== null) &&
                    (typeof (item.civico) !== "undefined" && item.civico !== null) &&
                    (typeof (item.comune) !== "undefined" && item.comune !== null) &&
                    (typeof (item.cap) !== "undefined" && item.cap !== null) &&
                    (typeof (item.prv) !== "undefined" && item.prv !== null) &&
                    (typeof (item.nascita) !== "undefined" && item.nascita !== null) &&
                    (typeof (item.sesso) !== "undefined" && item.sesso !== null) &&
                    (typeof (item.telefono) !== "undefined" && item.telefono !== null) &&
                    (typeof (item.mobile) !== "undefined" && item.mobile !== null) &&
                    (typeof (item.email) !== "undefined" && item.email !== null) &&
                    (typeof (item.privacy) !== "undefined" && item.privacy !== null) &&
                    (typeof (item.privacy1) !== "undefined" && item.privacy1 !== null) 
                )
                {

                    
                    if(isNaN(item.cap))
                    {
                        alert("ATTENZIONE CAP MANCANTE O INSERIRE SOLO VALORI NUMERICI")
                       return;
                    }

                    if(typeof(item.telefono) === "" || isNaN(item.telefono) || item.telefono.length ==0)
                    {
                       alert("INSERIRE TELEFONO");
                       return;
                    }

                    if(item.email.$valid)
                    {
                        alert("ATTENZIONE EMAIL NON VALIDA")
                    return;
                    }

                    if(item.privacy === 0)
                    {
                        alert("INSERIRE PRIVACY");
                        return;
                    }
                    


                  
                       

                        




                    weappservice.setNuovaTessera(item).then(function(data)
                    {
                        /*
                         console.log(item.nome);
                        console.log(item.cognome);
                        console.log(item.indirizzo);
                        console.log(item.civico);
                        console.log(item.cap);
                        console.log(item.prv);
                        console.log(item.nascita);
                        console.log(item.sesso);
                        console.log(item.telefono);
                        console.log(item.mobile);
                        console.log(item.email);
                        console.log(item.privacy);
                        console.log(item.privacy1);*/
                        
                       if(data.data === 'true')
                       {
                           swal({
                                title: "OK!",
                                text: "Cliente Aggiunto.",
                                timer: 2000,
                                imageUrl: "images/thumbs-up.jpg"
                            });
                            location.href="index.php";
                       }

                    });
                       
                }
        }
            
      
        
    }
});