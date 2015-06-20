'use strict';

var _json_listmail = [{"id":12323312,"r":false,"author":{"id":123123,"fname":"Phan Cao Vinh"},"subj":"Test title","body":"This is test content for message ...","date":"2014 Dec 12","star":true,"task":"15/01/2015"},{"id":12323313,"r":true,"author":{"id":123123,"fname":"Phan Van Nam"},"subj":"Merry Christmas to you","body":"This is test content for message ...","date":"2014 Dec 12","star":true,"task":"15/01/2015"},{"id":12323314,"r":true,"author":{"id":123124,"fname":"Tran Trieu Thanh Ha"},"subj":"Happy New Year everyone","body":"This is test content for message ...","date":"2014 Dec 12","star":true,"task":"15/01/2015"},{"id":12323312,"r":true,"author":{"id":123123,"fname":"Phan Cao Vinh"},"subj":"This is my first message to you","body":"This is test content for message ...","date":"2014 Dec 12","star":true,"task":"15/01/2015"}];
var _json_openmail = {"id":12323312,"author":{"id":123123,"fname":"Phan Cao Vinh","company":{}},"subj":"Test title","body":"<span style=\"font-weight: bold;\">Vinh</span> <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><footer>Someone famous in <cite title=\"Source Title\">Source Title</cite></footer></blockquote>","date":"2014 Dec 12","star":true,"task":"15/01/2015"};
//var _json_mailopen = {""};


// Declare app level module which depends on views, and components
angular.module('msgcenter', [
    'ui.router',
	'ngSanitize'
])
.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
})
.service('OpenMessage', function(){
	var self = this;
	this.updatecurrent = function(openmessage) {
		this.currentopenmessage = openmessage;
	}
	
	this.getcurrent =  function() {
		return this.currentopenmessage;
	}
})
.config([ '$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
	$stateProvider.state('mail', {
		url: '/mail', // list
		templateUrl: 'mail.html',
		controller: 'MailController'
	}).state('sent', {
		url: '/sent', // list
		templateUrl: 'sent_mail.html',
		controller: 'SentController'
	}).state('draft', {
		url: '/draft', // list
		templateUrl: 'sent_mail.html',
		controller: 'DraftController'
	}).state('open', {
		url: '/open/:id', // list
		templateUrl: 'open.html',
		controller: 'OpenController'
	}).state('open_sent', {
		url: '/open_sent/:id', // list
		templateUrl: 'open.html',
		controller: 'OpenSentController'
	}).state('compose', {
		url: '/compose',
		templateUrl: 'compose.html',
		controller: 'ComposeController'
	}).state('reply', {
		url: '/reply',
		templateUrl: 'compose.html',
		controller: 'ReplyController'
	});
	
	$urlRouterProvider.otherwise('/mail');
}])

.controller('MailController', function ($scope,  $http) {
	$http.get('./messagecenter/list').success(function(data) {
		$scope.mails = data;
	});

	//$scope.mails = _json_listmail;
	$scope.get_time = function(date) {
		return date.date;
	}
	
	$scope.is_read = function(read) {
		var ret;
		if(read) {
			return "read";
		} else {
			return "unread";
		}
	};
})
.controller('SentController', function ($scope,  $http) {
	$http.get('./messagecenter/list_sent').success(function(data) {
		$scope.mails = data;
	});

	//$scope.mails = _json_listmail;
	$scope.get_time = function(date) {
		return date.date;
	}
	
	$scope.is_read = function(read) {
		var ret;
		if(read) {
			return "read";
		} else {
			return "unread";
		}
	};
})
.controller('DraftController', function ($scope,  $http) {
	$http.get('./messagecenter/list_draft').success(function(data) {
		$scope.mails = data;
	});

	//$scope.mails = _json_listmail;
	$scope.get_time = function(date) {
		return date.date;
	}
	
	$scope.is_read = function(read) {
		var ret;
		if(read) {
			return "read";
		} else {
			return "unread";
		}
	};
})
.controller('OpenController', function ($scope, $http, $stateParams, $location, $sce, OpenMessage) {
	$http.get('./messagecenter/open/'+$stateParams.id).success(function(data) {
		$scope.mail = data;
		OpenMessage.updatecurrent(data);
			if(typeof $scope.mail.body !== 'undefined') {
				//$scope.mail.body = $sce.trustAsHtml($scope.mail.body);
			}
	});
	
	//$scope.mail = _json_openmail;
	//OpenMessage.updatecurrent(_json_openmail);
	//if(typeof $scope.mail.body !== 'undefined') {
		//$scope.mail.body = $sce.trustAsHtml($scope.mail.body);
	//}
	
	$scope.Reply = function() {
		$location.path('/reply');
	}
})
.controller('OpenSentController', function ($scope, $http, $stateParams, $location, $sce, OpenMessage) {
	$http.get('./messagecenter/open_sent/'+$stateParams.id).success(function(data) {
		$scope.mail = data;
		OpenMessage.updatecurrent(data);
			if(typeof $scope.mail.body !== 'undefined') {
				//$scope.mail.body = $sce.trustAsHtml($scope.mail.body);
			}
	});
	
	//$scope.mail = _json_openmail;
	//OpenMessage.updatecurrent(_json_openmail);
	//if(typeof $scope.mail.body !== 'undefined') {
		//$scope.mail.body = $sce.trustAsHtml($scope.mail.body);
	//}
	
	$scope.Reply = function() {
		$location.path('/reply');
	}
})
.controller('ComposeController', function ($scope, $location, $http, OpenMessage) {
	//$("#emailbody").wysihtml5();
	$scope.SenderId;
	$scope.Receivers;
	$scope.Subject;
	$scope.Body;
	
	$scope.$on('$viewContentLoaded',function(event){ 
		$('#emailbody').code("test");
	});	
	
	$scope.Send = function(){
		alert("send to:" + $scope.Receivers);
		$http({
		  method  : 'POST',
		  url     : './messagecenter/send',
		  data    : $.param({ received_ids : $scope.Receivers, subject : $scope.Subject, body : $('#emailbody').code()}),  // pass in data as strings	
		  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		 }).success(function(data) {
				$location.path('/mail');
		  });
	};
	
	$scope.Cancel = function(){
		
	};
	
	$scope.Draft = function(){
		
	};
})
.controller('ReplyController', function ($scope, $location, OpenMessage) {
	//$("#emailbody").wysihtml5();
	var currentopenmessage = OpenMessage.getcurrent();
	
	$scope.SenderId;
	$scope.Receivers = currentopenmessage.author.fname;
	$scope.Subject = currentopenmessage.subj;
	$scope.Body = currentopenmessage.body;
		
	$scope.$on('$viewContentLoaded',function(event){ 
		$('#emailbody').code("<br><br><blockquote>"+$scope.Body+"</blockquote>");
	});	
	
	$scope.Send = function(){
		alert("send to:" + $scope.Receivers);
		$http({
		  method  : 'POST',
		  url     : './messagecenter/send',
		  data    : $.param({ received_ids : $scope.Receivers, subject : $scope.Subject, body : $('#emailbody').code()}),  // pass in data as strings	
		  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
		 }).success(function(data) {
				$location.path('/mail');
		  });
	};
	
	$scope.Cancel = function(){
		
	};
	
	$scope.Draft = function(){
		
	};
})
.directive('tagInput', function() {
    return {
		restrict: 'A',
        link: function(scope, element, attrs) {
        	var contact = new Bloodhound({
			  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
			  queryTokenizer: Bloodhound.tokenizers.whitespace,
			  prefetch: './messagecenter/list_contact'
			});
			contact.initialize();

			var elt = $(element);
			elt.tagsinput({
			  tagClass: function(item) {
				if (item.c == true) {
					return 'label label-primary';
				} else {
					return 'label label-default';
				}
			  },
			  itemValue: 'id',
			  itemText: 'name',
			  typeaheadjs: {
				name: 'contact',
				displayKey: 'name',
				source: contact.ttAdapter()
			  }
			});

        }
    };
})
.directive('wysiHtml5', function() {
    return {
		restrict: 'A',
        link: function(scope, element, attrs) {
        	
            $(element).summernote({focus: true, height: 80});
        }
    };
});

 