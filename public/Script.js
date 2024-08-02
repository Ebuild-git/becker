function ShowProduitModal(id) {
    Livewire.dispatch("setPostId", { id: id });
    $("#product-view").modal("toggle");
}


    function sweet_alert(titre, type, text, duree) {
        Swal.fire({
            position: "center",
            icon: type,
            title: titre,
            text: text,
            showConfirmButton: false,
            timer: duree,
        });
    }


function AddToCart(id) {
    var quantityElement = $("#qte-" + id);
    //var tailletElement = $("#taille-" + id); 
   
   var selectedTaille = $('input[name="taille"]:checked').val();

  
   if (!selectedTaille) {
     
      Swal.fire({
        icon: 'warning',
        title: 'Aucune taille sélectionnée',
        text: 'Veuillez sélectionner une taille avant de continuer.',
        confirmButtonText: 'OK'
    });
       return;
   }

    if (quantityElement.length) {
        var quantity = quantityElement.val();
    } else {
        var quantity = 1;
    }

    var csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    var data = {
        id_produit: id,
        quantite: quantity,
        
       
       // taille: taille,
        taille: selectedTaille,
        _token: csrfToken,
    
    };
   
    fetch("/client/ajouter_au_panier", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(data),

    })

            
    
        .then((response) => response.json())
        .then((data) => {
            if (data.statut) {
                
                get_panier();
                location.reload(); 
                sweet_alert("Félicitation", "success", data.message, 1500);      
                            
            } else {
                sweet_alert("Attention !", "warning", data.message, 2500);
            }
        })
        .catch((error) => {
            console.error("Erreur:", error);
        });
}

get_panier();

 function get_panier() {
    $.get("/client/count_panier", function (data, status) {
        if (status) {
          //  console.log(data.list);
            $("#count-panier-span").text(data.total);
            $("#list_content_panier").html(data.list);
            $("#montant_total_panier").html(data.montant_total + " DT");
        } else {
            console.log("error get panier");
        }
    });
}
 



function DeleteToCart(id) {
    //delete produit from cart
    $.get(
        "/client/delete_produit_au_panier",
        {
            id_produit: id,
        },
        function (data, status) {
            if (status) {
                if (data.statut) {
                  
                   get_panier();
                    location.reload();
                   

                } else {
                    console.log("error delete product");
                }
            } else {
                console.log("error delete product reuest");
            }
        }
    );
}





function AddFavoris(id) {
    var csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    var data = {
        id_produit: id,
        _token: csrfToken,
    };
    fetch("/client/ajouter_favoris", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.statut) {
                sweet_alert("Félicitation", "success", data.message, 1500);
                location.reload();

         
            
            
            } else {
                console.log("Erreur lors de l'ajout du produit  aux favoris .");
            }
        })
        .catch((error) => {
            console.error("Erreur:", error);
        });
}

//changement de l'ordre des prix dans le shop
$(document).ready(function () {
    $("#OrdrePrix").change(function () {
        var selectedValue = $(this).val();
        Livewire.dispatch("ChangeOrdrePrix", { ordre: selectedValue });
    });
});




   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });


   $(document).ready(function(e){
      $('.range_slider').on('change',function(){
          let left_value = $('#input_left').val();
          let right_value = $('#input_right').val();
          // alert(left_value+right_value);
          $.ajax({
            //  url:"{{ route('search.products') }}",
              method:"GET",
              data:{left_value:left_value, right_value:right_value},
              success:function(res){
                 $('.search-result').html(res);
              }
          });
      });

      $('#sort_by').on('change',function(){
          let sort_by = $('#sort_by').val();
          $.ajax({
            url:"{{ route('sort.by') }}",
              method:"GET",
              data:{sort_by:sort_by},
              success:function(res){
                  $('.search-result').html(res);
              }
          });
      });
   })


   
   // filter items on button click for the categories  on the homepage
 /*   $filter.each(function() {
       $filter.on('click', 'button', function() {
           var filterValue = $(this).attr('data-filter');
           $topeContainer.isotope({
               filter: filterValue
           });
       });

   }); */

////////////////////////////////////////////////////////////////

   //  Pour la suppression du produit  du panier
    
     
   
//retitrer une publication de ma liste de favoris
function remove_favoris(id) {
    $.get(
        "/remove_favoris",
        {
            id_favoris: id,
        },
        function (data, status) {
            if (status) {
                $("#tr-" + id).hide("slow");
                Swal.fire({
                    position: "center",
                    icon: false,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2500,
                    customClass: "swal-wide",
                });
                if (data.count == 0) {
                   
                  //  location.reload();
                }
            }
        }
    );
}


