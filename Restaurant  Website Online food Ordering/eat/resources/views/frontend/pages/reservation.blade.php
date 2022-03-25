<section class="section" id="reservation">

    <div class="container">
        <div class="row">

          @if($contacts)
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>{{$contacts->title}}</h2>
                    </div>
                    <p>{{$contacts->description}}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="tel:{{$contacts->phone1}}">{{$contacts->phone1}}</a><br><a href="tel:{{$contacts->phone2}}">{{$contacts->phone2}}</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="mailto:{{$contacts->email1}}?Subject=Table Reservation">{{$contacts->email1}}</a><br><a href="mailto:{{$contacts->email2}}?Subject=Product Details">{{$contacts->email2}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-6">

              @if(Session::has('success'))
        <div style="width: 250px; text-align: center; margin: 0 auto;background: green; color: white; border: 1px solid gray; font-weight: bold; padding: 6px;">{{Session::get('success')}}</div>
        @endif

        @if ($errors->any())
        <div style="width: 300px; text-align: center; margin: 0 auto; background: red; color: black; border: 1px solid gray; font-weight: bold; padding: 6px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <br>

                <div class="contact-form">

                    <form id="contact" action="/reservation/complete" method="post">
                      {{csrf_field()}}

                      <div class="row">
                        <div class="col-lg-12">
                            <h4>Table Reservation</h4>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                          </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                          <input name="email" type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                        </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <fieldset>
                            
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number*" pattern="[0-9]{11}" required="">

                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <select value="number-guests" name="guests" id="number-guests">
                                <option value="number-guests">Number Of Guests</option>
                                <option name="1" id="1">1</option>
                                <option name="2" id="2">2</option>
                                <option name="3" id="3">3</option>
                                <option name="4" id="4">4</option>
                                <option name="5" id="5">5</option>
                                <option name="6" id="6">6</option>
                                <option name="7" id="7">7</option>
                                <option name="8" id="8">8</option>
                                <option name="9" id="9">9</option>
                                <option name="10" id="10">10</option>
                                <option name="11" id="11">11</option>
                                <option name="12" id="12">12</option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <div id="filterDate2">    
                              <div class="input-group date" data-date-format="dd/mm/yyyy">
                                <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                <div class="input-group-addon" >
                                  <span class="glyphicon glyphicon-th"></span>
                                </div>
                              </div>
                            </div>   
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <select value="time" name="time" id="time">
                                <option value="time">Time</option>
                                <option name="Breakfast" id="Breakfast">Breakfast</option>
                                <option name="Lunch" id="Lunch">Lunch</option>
                                <option name="Dinner" id="Dinner">Dinner</option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <input type="submit" id="form-submit" value="Make A Reservation">
                            
                          </fieldset>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>