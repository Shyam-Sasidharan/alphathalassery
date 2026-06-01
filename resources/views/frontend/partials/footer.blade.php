	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="widget">
						<h5>About Alpha</h5>
						<p class="footer-about"><img src="{{asset('front')}}/images/logo.png" alt="Alpha Center for Theology and Science" class="footer-logo">We offer comprehensive theology courses to promote serious study and research in the various fields of theology and religious sciences. Courses are guided by renowned scholars of international reputation.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h5>Quick Links</h5>
						<ul>
							<li><a href="{{url('about')}}">About us</a></li>
							<li><a href="{{url('bible-apostolate')}}">Bible Apostolate</a></li>
							<li><a href="{{url('study-centres')}}">Study Centers</a></li>
							<li><a href="{{url('publications')}}">Publications</a></li>
							<li><a href="{{url('library')}}">Library</a></li>
							<li><a href="{{url('contact')}}">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h5>Alpha Courses</h5>
						<ul>
							@if (($courses = \App\Models\COurse::orderBy('created_at')->get()) && !$courses->isEmpty())
								@foreach($courses as $course)
									<li>
										<a href="{{ url('course/'.$course->slug) }}">{{$course->name}}</a>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h5>Contact</h5>
						<p>Alpha Center for Theology and Science, Sandesa Bhavan, Thalassery-1, PB.No.71, Kerala, India</p>
						<p>Phone: <a href="tel:+914902343707">0091 490 2343707</a>, <a href="tel:+914902344727">2344727</a></p>
						<p>Mobile: <a href="tel:+914902344727">0091 490 2344727</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="copyright_wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<span>&copy; {{ date('Y') }} ALPHA Center for Theology and Science. All Rights Reserved.</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      				<span aria-hidden="true">&times;</span>
    			</button>
      			<div class="modal-body p-0">
      				<div class="login-form">
      					<div class="modal-card-title">
	      					<div class="modal-logo">
	      						<img src="{{asset('front')}}/images/logo.png" class="img-fluid">
	      					</div>
	      				</div>
      					<div class="login-form-content">
      						<form>
      							<div class="form-group">
      								<input type="text" name="user_id" placeholder="User ID" class="form-control">
      							</div>
      							<div class="form-group">
      								<input type="password" name="password" placeholder="Password" class="form-control">
      							</div>
      							<div class="form-group">
      								<button type="submit" class="btn btn-login btn-block">Login</button>
      							</div>
      						</form>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
    </div>
    <div class="modal" id="registerModal">
  		<div class="modal-dialog modal-lg">
    		<div class="modal-content">
      			<!-- Modal Header -->
      			<div class="modal-header">
        			<h4 class="modal-title">Application for Admission</h4>
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
      			</div>
      			<!-- Modal body -->
      			<div class="modal-body">
        			<div class="row">
        				<div class="col-md-12">
        					<form action="{{route('register')}}" method="post" enctype="multipart/form-data">
							{!! csrf_field() !!}
								<div class="row">
									<div class="col-md-6 form-group">
										<label>College</label>
										<select name="college" class="form-control {{ $errors->has('college') ?'is-invalid':'' }}" required="">
											<option value="ahirs" {{ old('college', 'ahirs') == 'ahirs' ? 'selected' : '' }}>Alpha Higher Institute of Religious Sciences</option>
											<option value="tacrs" {{ old('college') == 'tacrs' ? 'selected' : '' }}>Tely-Alpha Center For Religious Sciences</option>
										</select>
										<span class="invalid-feedback"> {{ $errors->first('college') }}</span>
									</div>
									<div class="col-md-6 form-group">
										<label>Course</label>
										<select name="course" id="course" class="form-control {{ $errors->has('course') ?'is-invalid':'' }}" required="">
											<option value="">Select Course</option>
											@foreach(['ahirs' => 'Alpha Higher Institute of Religious Sciences', 'tacrs' => 'Tely-Alpha Center For Religious Sciences'] as $collegeKey => $collegeLabel)
												<optgroup label="{{ $collegeLabel }}">
													@php
														$courseQuery = \App\Models\Course::orderBy('name');
														if (\Illuminate\Support\Facades\Schema::hasColumn('courses', 'college')) {
															$courseQuery->where('college', $collegeKey);
														}
													@endphp
													@foreach($courseQuery->get() as $course)
														<option value="{{ $course->name }}" {{ old('course') == $course->name ? 'selected' : '' }}>{{ $course->name }}</option>
													@endforeach
												</optgroup>
											@endforeach
										</select>
										<span class="invalid-feedback"> {{ $errors->first('course') }}</span>
									</div>
									<div class="col-md-6 form-group">
										<label>Contact Class Centre</label>
										<select name="centre" class="form-control {{ $errors->has('centre') ?'is-invalid':'' }}">
											<option value="">Select Centre</option>
											@foreach(['ahirs' => 'Alpha Higher Institute of Religious Sciences', 'tacrs' => 'Tely-Alpha Center For Religious Sciences'] as $collegeKey => $collegeLabel)
												<optgroup label="{{ $collegeLabel }}">
													@php
														$centerQuery = \App\Models\Center::orderBy('center');
														if (\Illuminate\Support\Facades\Schema::hasColumn('centers', 'college')) {
															$centerQuery->where('college', $collegeKey);
														}
													@endphp
													@foreach($centerQuery->get() as $center)
														<option value="{{ $center->center }}" {{ old('centre') == $center->center ? 'selected' : '' }}>{{ $center->center }}</option>
													@endforeach
												</optgroup>
											@endforeach
										</select>
										<span class="invalid-feedback"> {{ $errors->first('centre') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Medium of Language</label>
										<select name="language" class="form-control {{ $errors->has('language') ?'is-invalid':'' }}" required="">
											<option value="Malayalam">Malayalam</option>
											<option value="English">English</option>
										</select>
										<span class="invalid-feedback"> {{ $errors->first('language') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Name</label>
										<input type="text" name="name"  class="form-control {{ $errors->has('name') ?'is-invalid':'' }}" value="{{old('name')}}" required="">
										<span class="invalid-feedback"> {{ $errors->first('name') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Phone Number</label>
										<input type="text" name="phone"  class="form-control {{ $errors->has('phone') ?'is-invalid':'' }}" value="{{old('phone')}}" required="">
										<span class="invalid-feedback"> {{ $errors->first('phone') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Email</label>
										<input type="email" name="email"  class="form-control {{ $errors->has('email') ?'is-invalid':'' }}" value="{{old('email')}}" required="">
										<span class="invalid-feedback"> {{ $errors->first('email') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Date of Birth</label>
										<input type="text" name="dob" class="form-control {{ $errors->has('dob') ?'is-invalid':'' }}" value="{{old('dob')}}" required="" id="dob">
										<span class="invalid-feedback"> {{ $errors->first('dob') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Sex</label>
										<select name="sex" class="form-control {{ $errors->has('sex') ?'is-invalid':'' }}" required="">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
										<span class="invalid-feedback"> {{ $errors->first('sex') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Nationality</label>
										<input type="text" name="nationality" class="form-control {{ $errors->has('nationality') ?'is-invalid':'' }}" value="{{old('nationality')}}" required="">
										<span class="invalid-feedback"> {{ $errors->first('nationality') }}</span>
									</div>
									<div class="col-md-4 form-group">
										<label>Marital Status</label>
										<select name="marital" class="form-control {{ $errors->has('marital') ?'is-invalid':'' }}" required="">
											<option value="Married">Married</option>
											<option value="Unmarried">Unmarried</option>
											<option value="Religious">Religious</option>
										</select>
										<span class="invalid-feedback"> {{ $errors->first('marital') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Diocese</label>
										<input type="text" name="diocese" class="form-control {{ $errors->has('diocese') ?'is-invalid':'' }}" value="{{old('diocese')}}">
										<span class="invalid-feedback"> {{ $errors->first('diocese') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Parish</label>
										<input type="text" name="parish" class="form-control {{ $errors->has('parish') ?'is-invalid':'' }}" value="{{old('parish')}}">
										<span class="invalid-feedback"> {{ $errors->first('parish') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Highest Qualification</label>
										<input type="text" name="qualification" class="form-control {{ $errors->has('qualification') ?'is-invalid':'' }}" value="{{old('qualification')}}" required="">
										<span class="invalid-feedback"> {{ $errors->first('qualification') }}</span>
									</div>
									<div class="form-group col-md-4">
										<label>Occupation</label>
										<input type="text" name="occupation" class="form-control {{ $errors->has('occupation') ?'is-invalid':'' }}" value="{{old('occupation')}}">
										<span class="invalid-feedback"> {{ $errors->first('occupation') }}</span>
									</div>
									<div class="col-md-12 form-group">
										<label>Address</label>
										<textarea name="address" class="form-control {{ $errors->has('address') ?'is-invalid':'' }}">{{old('address')}}</textarea>
										<span class="invalid-feedback"> {{ $errors->first('address') }}</span>
									</div>
									<div class="col-md-12 form-group">
										<label>Certificate <span id="category"></span></label>
                                        <input type="file" name="certificate" accept=".pdf" value="{{old('certificate')}}" class="form-control {{ $errors->has('certificate') ?'is-invalid':'' }}">
                                        <span class="invalid-feedback">{{ $errors->first("certificate") }}</span>
                                    </div>
									<div class="col-md-12 form-group">
										<label>Photo (Upload Passport Size Photo)</label>
                                        <input type="file" name="photo" accept="image/*" value="{{old('photo')}}" class="form-control {{ $errors->has('photo') ?'is-invalid':'' }}">
                                        <span class="invalid-feedback">{{ $errors->first("photo") }}</span>
                                    </div>
									<div class="col-md-12 form-group">
										<label>Fee Receipt (Upload Scanned Copy of the Chalan)</label>
                                        <input type="file" name="fee" accept=".pdf" value="{{old('fee')}}" class="form-control {{ $errors->has('fee') ?'is-invalid':'' }}">
                                        <span class="invalid-feedback">{{ $errors->first("fee") }}</span>
                                    </div>
									<div class="col-md-12 form-group">
										<label>Type the letters in the image</label>
										<p>{!! captcha_img() !!}</p>
										<input type="text" name="captcha" class="form-control {{ $errors->has('captcha') ?'is-invalid':'' }}" required>
                                        <span class="invalid-feedback">{{ $errors->first("captcha") }}</span>
									</div>
									<div class="form-group col-md-12">
										<button class="btn-submit btn float-right" type="submit">Submit</button>
									</div>
								</div>
							</form>
        				</div>
        			</div>
      			</div>
    		</div>
  		</div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('front')}}/js/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script type="text/javascript" src="{{ asset('front')}}/js/lightbox.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.28/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
	<script type="text/javascript" src="{{asset('front')}}/js/jquery.vticker-min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
	<script type="text/javascript" src="{{ asset('front')}}/js/script.js"></script>
	<script type="text/javascript">
		$(function(){
			@if(!empty($errors->all()))
			$("#course").val("{{old('course')}}")
			$("#registerModal").modal('show');
			@endif

			$(".subscribe").on('submit', function(){
	            $.post('{{route('subscribe')}}', $(this).serialize(), function(response){
	                if (response.status){
	                    $("#subscribe").val('');
	                    swal({
	                        position: 'top-end',
	                        type: 'success',
	                        text: 'You have successfully subscribed to newsletter',
	                        showConfirmButton: false,
	                        timer: 3500
	                    })
	                }else{
	                    swal({
	                        position: 'top-end',
	                        type: 'error',
	                        text: response.error,
	                        showConfirmButton: false,
	                        timer: 3500
	                    });
	                }
	            });
	           return false;
	        });
	        // notification
            function notify(type, message) {
                swal({
                    position: 'top-end',
                    type: type,
                    text: message,
                    showConfirmButton: false,
                    timer: 3500
                })
            }
	        //alert notifications
	        @if(session()->has('success'))
	            swal({
	                type: 'success',
	                text: '{{session()->get('success')}}',
	                showConfirmButton: false,
	                timer: 3500
	            });
	        @endif

	        @if(session()->has('error'))
	        swal({
	            type: 'error',
	            text: '{{session()->get('error')}}',
	            showConfirmButton: false,
	            timer: 3500
	        });
	        @endif

	        @if(session()->has('info'))
	        swal({
	            type: 'question',
	            text: '{{session()->get('info')}}',
	            showConfirmButton: false,
	            timer: 3500
	        });
	        @endif
		})
		var item, pr;
		var courses = {
		    'Diploma in Theology' : '(Upload SSLC Certificate)',
		    'Bachelors Degree in Theology' : '(Upload +2 Certificate)',
		    'Masters Degree in Theology - Biblical Theology' : '(Upload Scanned Copy of BTH Certificate)',
		    'Masters Degree in Theology - Moral Theology' : '(Upload Scanned Copy of BTH Certificate)',
		    'Masters Degree in Theology - Dogmatic Theology' : '(Upload Scanned Copy of BTH Certificate)',
		    'Integrated MA in Theology - Biblical Theology' : '(Upload Scanned Copy of PG Certificate)',
		    'Integrated MA in Theology - Moral Theology' : '(Upload Scanned Copy of PG Certificate)',
		    'Integrated MA in Theology - Dogmatic Theology' : '(Upload Scanned Copy of PG Certificate)',
		    'Ph.D in Theology' : ''
		};

		$('#course').change(function() {
		    item = $(this).val();
		    pr = courses[item];
		    $('#category').html(pr);
		});
	</script>
</body>
</html>
