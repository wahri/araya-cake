@extends('layouts.app')

@push('style')
@endpush

@push('sript')
@endpush

@section('content')
    <!-- PAGE HERO
               ============================================= -->
    <div id="about-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <!-- Title -->
                        <h2 class="h2-xl">Galeri Cake Araya</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->


    <!-- GALLERY-2
			============================================= -->		
			<section id="gallery-2" class="gallery-section division">
				<div class="container">
					<div class="row">


						<!-- IMAGE #1 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-01.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-01.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Classic California</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.5</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(23)</span>
												</div>		
											</div>										 
										</div> 

									</div>
								</a>
							</div>
						</div>


						<!-- IMAGE #2 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-02.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-02.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Margherita Pizza</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.52</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(58)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #3 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-03.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-03.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Grilled Ribs</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.9</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span>(69)</span>
												</div>		
											</div>										 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #4 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-04.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-04.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Field Greens Pizza</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.38</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(41)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #5 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-05.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-05.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Mini Chicken Pizza</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>5</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span>(86)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #6 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-06.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-06.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Eggs Benedict Burger</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.65</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(30)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #7 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-07.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-07.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Double Bacon Burger</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.85</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span>(71)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #8 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-08.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-08.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Classic California</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.64</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(17)</span>
												</div>		
											</div>												 
										</div> 

									</div>
								</a>
							</div>
						</div>



						<!-- IMAGE #9 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-09.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-09.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Grilled Salmon</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>5</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span>(64)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #10 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-10.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-10.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Philadelphia Roll</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.65</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(89)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #11 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-11.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-11.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Lemon Garlic Shrimp</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.85</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span>(71)</span>
												</div>		
											</div>											 
										</div> 

									</div>
								</a>
							</div>
						</div>	


						<!-- IMAGE #12 -->
					  	<div class="col-sm-6 col-lg-3">
					  		<div class="gallery-img">
						  		<a href="{{ asset('home-assets/images/gallery/img-12.jpg') }}" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-12.jpg') }}" alt="gallery-image" />			
										<div class="item-overlay"></div>

										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-xs">Spaghetti Bolognese</h5>		
											<div class="txt-block-rating">
												<div class="stars-rating">
													<span>4.64</span>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
													<span>(116)</span>
												</div>		
											</div>												 
										</div> 

									</div>
								</a>
							</div>
						</div>


					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	
			<!-- END GALLERY-2 -->
@endsection


