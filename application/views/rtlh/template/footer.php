<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="modal animated fadeIn modal-danger" id="log-off" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Keluar!</h4>
                <span>Yakin anda akan Keluar dari sistem?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?php echo base_url("login/signout?from_url=".current_url()) ?>" type="button" class="btn btn-outline"> Iya </a>
              </div>
            </div>
          </div>
        </div> 

      </section>
     </div>
 
     <footer class="main-footer "> <!-- navbar navbar-fixed-bottom -->
    <div class="pull-right hidden-xs">
      <b>Versi</b> 1.0.0 (Pre Release)
    </div>
   <div class="container text-center">
      <small>Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Dinas Perumahan Rakyat dan Kawasan Pemukiman Provinsi Kepuluan Bangka Belitung Develop By <a href="http://teitramega.co.id" target="_blank">Teitra Mega</a><small>
   </div>
</footer>

   <?php 
   /**
    * Load js from loader core
    *
    * @return CI_OUTPUT
    **/
   if($this->load->get_js_files() != FALSE) : 
      foreach($this->load->get_js_files() as $file) :  
    ?>
         <script src="<?php echo $file; ?>?v=<?php echo date('YmdHis'); ?>"></script>
   <?php 
      endforeach; 
    endif; 
  ?>

    <script>

        // fake JSON call
        // function getJSONMarkers() {
        //   const markers = [
        //     {
        //       name:  "Rumah Adisuputra",
        //       location: [-2.106503, 106.0915548],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Muhamad Zakky",
        //       location: [-2.106247,106.0915118],
        //       icon:'red-dot.png'
        //     },
        //     {
        //       name: "Rumah Rizal",
        //       location: [-2.10645, 106.0912808],
        //       icon:'blue-dot.png'
        //     },
        //     {
        //       name: "Rumah Bachtiyar",
        //       location: [-1.916340, 105.930475],
        //       icon:'blue-dot.png'
        //     },
        //     {
        //       name: "Rumah Cupat",
        //       location: [-1.638400, 105.589066],
        //       icon:'blue-dot.png'
        //     },
        //     {
        //       name: "Rumah Dendang",
        //       location: [-2.924944, 107.899795],
        //       icon:'blue-dot.png'
        //     },
        //     {
        //       name: "Rumah Lialang",
        //       location: [-3.124886, 108.067492],
        //       icon:'yellow-dot.png'
        //     },
        //     {
        //       name: "Rumah Lepar Pongok",
        //       location: [-2.960273, 106.824529],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Berang",
        //       location: [-1.987686, 105.454641],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Kapur",
        //       location: [-2.237226, 105.879680],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Tua tunu",
        //       location: [-2.079026, 106.060015],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Tanjung Pure",
        //       location: [-2.372517, 105.871016],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Ibul",
        //       location: [-1.916905, 105.464522],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Tanjung Limau",
        //       location: [-1.560014, 105.585372],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Rumah Kemingking",
        //       location: [-2.471305, 106.170394],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-1.988274, 105.450789],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.633193, 106.590621],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.718244, 105.983626],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.345074, 105.923201],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.065131, 105.854537],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.713925, 105.964067],
        //       icon:'green-dot.png'
        //     },

        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.345074, 105.923201],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.065131, 105.854537],
        //       icon:'green-dot.png'
        //     },
        //     {
        //       name: "Belum Ada Nama Pemilik Rumah",
        //       location: [-2.713925, 105.964067],
        //       icon:'green-dot.png'
        //     },


        //   ];
        //   return markers;
        // }

        // function loadMap() {
        //   // Initialize Google Maps
        //   const mapOptions = {
        //     center:new google.maps.LatLng(-2.309189,106.7858913),
        //     zoom: 8
        //   }
        //   const map = new google.maps.Map(document.getElementById("map"), mapOptions);

        //   // Load JSON Data
        //   const RtlhMarker = getJSONMarkers();

        //   var contentString = 
        //   '<div id="content">Rumah Adisuputra</div>';

        //   var infowindow = new google.maps.InfoWindow({
        //     content: contentString
        //   });

        //   // Initialize Google Markers
        //   for(rtlh of RtlhMarker) {
        //     let marker = new google.maps.Marker({
        //       map: map,
        //       position: new google.maps.LatLng(rtlh.location[0], rtlh.location[1]),
        //       title: rtlh.name, icon: 'http://maps.google.com/mapfiles/ms/icons/'+rtlh.icon
        //     });

        //     marker.addListener('click', function() {
        //       infowindow.open(map, marker);

        //     });
        //   }
        // }

  
  map = null;

  function loadMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: {lat: -2.309189, lng: 106.7858913}
    });

    var WindCollection=[
               {Pemilik: 'Adisuputra', lat: -2.713925,  lng:105.964067 },

              ];

    WindCollection.forEach(function(windplace) {
      var marker=new google.maps.Marker({position:{lat:windplace.lat, lng:windplace.lng}, clickable:true, map:map, animation:google.maps.Animation.DROP, icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png' });
      

      google.maps.event.addListener(marker,'click',function() {
      var infowindow = new google.maps.InfoWindow();
      var infolist=jQuery('<div></div>');
      for (attribute in windplace) {
        infolist.append('<b>'+windplace[attribute]+'</b></br>');
      }
      infowindow.setContent('<div class="infowindow">'+infolist.html()+'</div>');
      infowindow.open(map, marker);
      map.panTo(marker.getPosition());
      });
    });

    
     

     
  }



      </script>

      <script src = "https://maps.googleapis.com/maps/api/js"></script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2bG9GMVdY6droTYBhjR9TD2XgV2cZQd8">
      </script>


   
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */