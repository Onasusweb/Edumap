

NetCommonsApp.controller('Edumap',
                         function($scope, $sce, $modal, $modalStack) {

	//index画面
	$scope.PLUGIN_INDEX_URL = '/edumap/edumap';
	//edit画面
	$scope.PLUGIN_EDIT_URL = '/edumap/edumap_edit/';

	$scope.edumap = {};
	$scope.edumap_student = {};

	$scope.initialize = function(frameId,edumap,edumap_student){
	        $scope.frameId = frameId;
	        $scope.edumap = edumap;
	        $scope.edumap_student = edumap_student;
	};


	$scope.showManage = function(){
		$modalStack.dismissAll('canseled');

		var templateUrl = $scope.PLUGIN_EDIT_URL +
				'view/' + $scope.frameId + '.json';
		var controller = 'Edumap.edit';

	        $modal.open({
	          templateUrl: templateUrl,
	          controller: controller,
	          backdrop: 'static',
	          scope: $scope
	        }).result.then(
	            function(result) {},
	            function(reason) {
	              if (typeof reason.data === 'object') {
	                //openによるエラー
	                $scope.flash.danger(reason.status + ' ' + reason.data.name);
	              } else if (reason === 'canceled') {
	                //キャンセル
	                $scope.flash.close();
	              }
	            }
	        );
	};
});

NetCommonsApp.controller('Edumap.edit',
                         function($scope, $http, $modalStack) {

      $scope.sending = false;

      $scope.edit = {
        _method: 'POST',
        data: {}
      };

      $scope.initialize = function() {
        $scope.edit.data = {
          Edumap: {
            status: $scope.edumap.Edumap.status,
            block_id: $scope.edumap.Edumap.block_id,
            key: $scope.edumap.Edumap.key,
            id: $scope.edumap.Edumap.id
          },
          Frame: {
            id: $scope.frameId
          },
          _Token: {
            key: '',
            fields: '',
            unlocked: ''
          }
        };
      };
      $scope.initialize();

      $scope.cancel = function() {
        $modalStack.dismissAll('canceled');
      };

      $scope.save = function(status) {
        $scope.sending = true;

        $http.get($scope.PLUGIN_EDIT_URL + 'form/' +
                  $scope.frameId + '/' + Math.random() + '.json')
            .success(function(data) {
              //フォームエレメント生成
              var form = $('<div>').html(data);

              //セキュリティキーセット
              $scope.edit.data._Token.key =
                  $(form).find('input[name="data[_Token][key]"]').val();
              $scope.edit.data._Token.fields =
                  $(form).find('input[name="data[_Token][fields]"]').val();
              $scope.edit.data._Token.unlocked =
                  $(form).find('input[name="data[_Token][unlocked]"]').val();

              //ステータスセット
              $scope.edit.data.Edumap.status = status;

              //登録情報をPOST
              $scope.sendPost($scope.edit);
            })
            .error(function(data, status) {
              //keyの取得に失敗
              $scope.flash.danger(status + ' ' + data.name);
              $scope.sending = false;
            });
      };

      $scope.sendPost = function(postParams) {
        $http.post($scope.PLUGIN_EDIT_URL + 'edit/' + Math.random() + '.json',
            $.param(postParams),
            {headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
          .success(function(data) {
              angular.copy(data.edumap, $scope.edumap);
              $scope.flash.success(data.name);
              $scope.sending = false;
              $modalStack.dismissAll('saved');
            })
          .error(function(data, status) {
              $scope.flash.danger(status + ' ' + data.name);
              $scope.sending = false;
            });
      };

    });
