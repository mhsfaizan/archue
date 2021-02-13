<div my-nav></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchCompetitionController">
	<div class="home-margin">
		<button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE COMPETITION</button>
		<button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE COMPETITION</button>
		
		<div class="space"></div>
		<div class="container-fluid">
			<div class="row">
				<div ng-if="competition.is_approve==0" ng-show="isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="competition in competitions|limitTo:10 track by $index">
					<p><b>Uploaded By:</b>{{competition.competitor_name}}</p>
					<a ng-href="./competition/{{competition.competitor_id}}/{{competition.competitor_name}}" ng-click="setCompetition(competition)" class="blog-img">
						<img ng-src="../upload-file/{{competition.competitor_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<h3>{{competition.competition_heading}}</h3>
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{competition.competitor_date}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="sanitize(competition.competitor_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./competition/{{competition.competitor_id}}/{{competition.competitor_name}}" ng-click="setCompetition(competition)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
				<div ng-if="competition.is_approve==1" ng-show="!isShowApprove" class="mb-5 col-md-4 border border-dark p-2" ng-repeat="competition in competitions|limitTo:10 track by $index">
					<p><b>Uploaded By:</b>{{competition.competitor_name}}</p>
					<a ng-href="./competition/{{competition.competitor_id}}/{{competition.competitor_name}}" ng-click="setCompetition(competition)" class="blog-img">
						<img ng-src="../upload-file/{{competition.competitor_file}}" class="img-fluid">
					</a>
					<div class="blog-heading border-bottom border-info ">
						<h3>{{competition.competition_heading}}</h3>
						<div class="date-time">
							<span class="fa fa-calendar"></span>&nbsp;{{competition.competitor_date}}
						</div>
					</div>
					<div class="blog-content">
						<div ng-bind-html="sanitize(competition.competitor_content)"></div>
					</div>
					<div class="continue-btn pull-right">
						<a ng-href="./competition/{{competition.competitor_id}}/{{competition.competitor_name}}" ng-click="setCompetition(competition)">Continue Reading <span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>