<section class="section-padding" id="thesis-sec-1" ng-controller="fetchThesisController">
	<div class="home-margin">
		<div class="space"></div>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-9">

					<div class="cur-page-div">
						<a href="./">Archue</a>
						<span class="fa fa-angle-right"></span>
						<span>Project</span>
						<span class="fa fa-angle-right"></span>
						<span>{{category}}</span>
					</div>
					<div class="space"></div>
					<div class="d-flex">
						<div class="project-top-header">
							<h5>{{category}}</h5>
						</div>
						<div class="category">
							<div class="dropdown">
							  <button class="dropdown-toggle" type="button" data-toggle="dropdown">
							    CATEGORY+
							  </button>
							  <div class="dropdown-menu">
							  	<a href="#" class="dropdown-item" ng-click="setCategory($)">All</a>
							    <a class="dropdown-item" href="#" ng-repeat="cat in categories|orderBy:cat track by $index" ng-click="setCategory(cat)">{{cat}}</a>
							  </div>
							</div>
							<!-- <select ng-model="category" class="project-select">
								<option>{{category}}</option>
								<option ng-repeat="cat in categories track by $index">{{cat}}</option>
								}
							</select> -->
						</div>
					</div>
					<div class="yellow-line bg-color"></div>
					<div class="project-container">
						<ul class="projects" >
							<li ng-if="res.length>0" ng-repeat="singlepro in res = (fullThesisArr|filter:category) track by $index">
								<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
									<img ng-src="uploads/{{singlepro.singleThesis.file}}" width="100%" height="100%">
									
								</a>
								<a href="./full-thesis/{{singlepro.singleThesis.file_name}}" class="text-dark" ng-click="setThesis(singlepro)">
									<p>{{singlepro.singleThesis.file_name}}</p>
								</a>
							</li>
						</ul>
						<div ng-if="res.length==0" class="alert alert-danger">
							No Thesis Found For Such Category
						</div>
					</div>	
				</div>
				<div class="col-md-3 pr-0">
					<div class="blog-header material-bg mt-5">
						<h3 class="home-page-heading">Materials</h3>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
					<div class="sm-blog-container">
						<div class="image">
							<img src="image/project-img-1.jpg" alt="project-img-1" width="100%">
						</div>
						<div class="link">
							<a href="#">
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
	</div>
</section>
