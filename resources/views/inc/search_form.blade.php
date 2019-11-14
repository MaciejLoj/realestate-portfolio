
<form action="">
  <div class="realestate-filter">
    <div class="container">
      <div class="realestate-filter-wrap nav">
        <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">Wynajem</a>
        <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">Sprzedaż</a>
      </div>
    </div>
  </div>

  <div class="realestate-tabpane pb-5">
    <div class="container tab-content">
       <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">

         <div class="row">
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               {{-- <option value="" disabled selected>Dzielnica</option> --}}
               <option value="">Cała Warszawa</option>
               <option value="">Bemowo</option>
               <option value="">Białołęka</option>
               <option value="">Bielany</option>
               <option value="">Mokotów</option>
               <option value="">Ochota</option>
               <option value="">Praga Południe</option>
               <option value="">Praga Północ</option>
               <option value="">Śródmieście</option>
               <option value="">Targówek</option>
               <option value="">Ursynów</option>
               <option value="">Żoliborz</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
               <select name="" id="" class="form-control w-100">
                 <option value="" disabled selected>Powierzchnia</option>
                 <option value="">0-20m<sup>2</sup></option>
                 <option value="">20-30m2</option>
                 <option value="">30-40m2</option>
                 <option value="">40-60m2</option>
                 <option value="">60m2+</option>
               </select>
           </div>
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
                 {{-- <option value="" disabled selected>Rynek</option> --}}
                 <option value="">Rynek wtórny</option>
                 <option value="">Rynek pierwotny</option>
             </select>
           </div>
         </div>

         <div class="row">
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               <option value="" disabled selected>Ilość pokoi</option>
               <option value="">0</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3</option>
               <option value="">3+</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               <option value="">Mieszkanie</option>
               <option value="">Dom</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
             <div class="row">
               <div class="col-md-6 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Cena minimalna</option>
                   <option value="">0</option>
                   <option value="">100</option>
                   <option value="">200</option>
                   <option value="">300</option>
                   <option value="">400</option>
                 </select>
               </div>
               <div class="col-md-6">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Cena maksymalna</option>
                   <option value="">25,000</option>
                   <option value="">50,000</option>
                   <option value="">75,000</option>
                   <option value="">100,000</option>
                   <option value="">100,000</option>
                 </select>
               </div>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-4">
             <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
           </div>
         </div>

       </div>
       <div class="tab-pane" id="for-sale" role="tabpanel" aria-labelledby="sale-tab">
         <div class="row">
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               <option value="">All Types</option>
               <option value="">Townhouses</option>
               <option value="">Duplexes</option>
               <option value="">Quadplexes</option>
               <option value="">Condominiums</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
             <input type="text" class="form-control" placeholder="Title">
           </div>
           <div class="col-md-4 form-group">
             <input type="text" class="form-control" placeholder="Address">
           </div>
         </div>

         <div class="row">
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               <option value="">Any Bedrooms</option>
               <option value="">0</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3+</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
             <select name="" id="" class="form-control w-100">
               <option value="">Any Bathrooms</option>
               <option value="">0</option>
               <option value="">1</option>
               <option value="">2</option>
               <option value="">3+</option>
             </select>
           </div>
           <div class="col-md-4 form-group">
             <div class="row">
               <div class="col-md-6 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Min Price</option>
                   <option value="">$100</option>
                   <option value="">$200</option>
                   <option value="">$300</option>
                   <option value="">$400</option>
                 </select>
               </div>
               <div class="col-md-6">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Max Price</option>
                   <option value="">$25,000</option>
                   <option value="">$50,000</option>
                   <option value="">$75,000</option>
                   <option value="">$100,000</option>
                   <option value="">$100,000,000</option>
                 </select>
               </div>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-4">
             <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
           </div>
         </div>

       </div>
    </div>
  </div>
</form>
