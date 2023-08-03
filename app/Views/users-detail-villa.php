<?= $this->extend('layout/template-properties'); ?>
<?= $this->section('content'); ?>


  <!-- Start Proerty header  -->
  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Properties Page</h2>
            <ol class="breadcrumb">
            <li><a href="/">HOME</a></li>            
            <li class="active"><?= $villa['villa_name']; ?></li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">            
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
             <?php if($villaContent!=null) : ?>
                  <img src="<?= base_url() . "/uploads/data_thumbnail/" . $villa['thumbnail']; ?>" alt="img">
                  <img src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_1']; ?>" alt="img">
                  <img src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_2']; ?>" alt="img">
                  <img src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_3']; ?>" alt="img">
                  <img src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_4']; ?>" alt="img">
                  <img src="<?= base_url() . "/uploads/data_content/" . $villaContent['image_5']; ?>" alt="img">
              <?php else : ?>
                <img src="<?= base_url() . "/uploads/data_thumbnail/" . $villa['thumbnail']; ?>" alt="img">
              <?php endif; ?>
             </div>
             <div class="aa-properties-info">
               <h2><?= $villa['villa_name']; ?></h2>
               <span class="aa-price"><?= number_to_currency($villa['price'], 'IDR', 'en_DB'); ?></span>
               <p><?= $villa['description']; ?></p>
               <h4>Property Features</h4>
               <ul>
               <?php
                $no= 1;
                foreach ($features as $row) {
                ?>
                  <li><?= $row['features_name']; ?></li>
                <?php
                }
                ?>
               </ul>
               <!--  -->
               <h4>Property Map</h4>
               <?php if($villaContent!=null) : ?>
                <iframe src="<?= $villaContent['link_maps']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <?php else : ?>
                <h6>Maps isn't available now</h6>
              <?php endif; ?>
              <br>

              <?php 
                $booking = new \App\Models\Booking();
                $bookings = $booking->where('status', 'Paid')->findAll();
                $booked_villa_ids = array();
                foreach ($bookings as $booking) {
                    $booked_villa_ids[] = $booking['id_villa'];
                }
              ?>

                <?php if (in_array($villa['id'], $booked_villa_ids)) { ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" disabled="disabled" title="Already Booked" >BOOK NOW</button>
                <?php } else { ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">BOOK NOW</button>
                <?php } ?>

              <a href="https://wa.me/+6287862269020?text=Hello, I want to ask about <?= $villa['villa_name']; ?>" type="button" target="blank" class="btn btn-success"><i class="fa fa-whatsapp"></i> CHAT</a>
             </div>
            </div>           
          </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Booking Form for <b><?= $villa['villa_name']; ?></b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="booking" method="POST" action="/user-booking-villa">
                <?= csrf_field(); ?>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">ID Villa</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="id_villa" value="<?= $villa['id']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">ID User</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="id_user" value="<?= session('id'); ?>" readonly>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="price" value="<?= $villa['price']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" oninput="updateEndDate()" required>
                  </div>
                  <div class="form-group">
                    <label for="duration">Duration (in days)</label>
                    <input type="number" class="form-control" id="duration" name="duration" min="0" max="100" step="1" oninput="updateEndDate()" required>
                  </div>
                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" readonly>
                  </div>
                  <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="decimal" class="form-control" id="total_price" name="total_price" readonly>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary book">BOOK</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Search Villa</h3>
              <form action="/user-search-villa-properties" method="post">
              <?= csrf_field(); ?>
                <div class="aa-single-advance-search">
                  <input type="text" placeholder="Find Your Villa, e.g.Ubud" name="query" required>
                </div>
                <!-- <div class="aa-single-advance-search">
                  <select id="" name="">
                   <option selected="" value="0">Category</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">Type</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="">
                    <option selected="" value="0">Type</option>
                    <option value="1">Flat</option>
                    <option value="2">Land</option>
                    <option value="3">Plot</option>
                    <option value="4">Commercial</option>
                  </select>
                </div>
                <div class="aa-single-filter-search">
                  <span>AREA (SQ)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper" class="example-val">100.00</span>
                  <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>                  
                </div>
                <div class="aa-single-filter-search">
                  <span>PRICE ($)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower2" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper2" class="example-val">100.00</span>
                  <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>      
                </div> -->
                <div class="aa-single-advance-search">
                  <input type="submit" value="Search" class="aa-search-btn">
                </div>
              </form>
            </div> 
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Populer Properties</h3>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="/img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="/img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="/img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->

  <script type="text/javascript">
    $(".book").click(function(event){
      event.preventDefault();
      // Perform validation here
      var isValid = true;
      $('#booking input[required]').each(function() {
        if ($.trim($(this).val()) == '') {
          isValid = false;
          return false;
        }
      });
      if (!isValid) {
        swal.fire({
          text: "Please fill all required fields!",
          icon: "warning"
        });
        return;
      }
      // Show confirmation dialog
      swal.fire({
        title: "Are you sure?",
        text: "The Form Will Be Submitted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes!",
        cancelButtonText: "No!",
        customClass: {
          confirmButton: "btn btn-danger",
        },
        allowOutsideClick: () => !Swal.isLoading(),
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form
          $('#booking').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swal("Cancelled", "error");
        }
      });
    });
</script>


<script>
  function updateEndDate() {
    var startDate = document.getElementById('start_date').value;
    var duration = parseInt(document.getElementById('duration').value);
    var pricePerDay = <?= $villa['price']; ?>;
    if (startDate && duration) {
      var endDate = new Date(startDate);
      endDate.setDate(endDate.getDate() + duration);
      document.getElementById('end_date').value = endDate.toISOString().substr(0, 10);
      var totalPrice = duration * pricePerDay;
      var totalPriceIDR = totalPrice.toLocaleString('id-ID', { style: 'currency', currency: 'IDR'});
      document.getElementById('total_price').value = totalPriceIDR;
    }
  }
</script>

  <?= $this->endSection(); ?>