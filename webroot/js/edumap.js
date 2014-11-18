

NetCommonsApp.controller('Edumap',
                         function($scope, $sce, $modal, $modalStack) {

	//index画面
	$scope.PLUGIN_INDEX_URL = '/edumap/edumap';
	//edit画面
	$scope.PLUGIN_EDIT_URL = '/edumap/edumap_edit/';

	$scope.edumap = {};
	$scope.edumap_social_media = {};	
	$scope.edumap_visibility_frame_setting = {};

	$scope.initialize = function(frameId,edumap,edumap_social_media,edumap_visibility_frame_setting){
	        $scope.frameId = frameId;
	        $scope.edumap = edumap;
	        $scope.edumap_social_media = edumap_social_media;
	        $scope.edumap_visibility_frame_setting = edumap_visibility_frame_setting;
	};


	$scope.showManage = function(Manage){
		$modalStack.dismissAll('canseled');

		var templateUrl = $scope.PLUGIN_EDIT_URL +
				Manage + $scope.frameId + '.json';
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
            id: $scope.edumap.Edumap.id,
            name: $scope.edumap.Edumap.name,
            name_kana: $scope.edumap.Edumap.name_kana,
            handle: $scope.edumap.Edumap.handle,
            postal_code: $scope.edumap.Edumap.postal_code,
            prefecture_code: $scope.edumap.Edumap.prefecture_code,
            location: $scope.edumap.Edumap.location,
            tel: $scope.edumap.Edumap.tel,
            fax: $scope.edumap.Edumap.fax,
            emergency_email: $scope.edumap.Edumap.emergency_email,
            inquiry: $scope.edumap.Edumap.inquiry,
            site_url: $scope.edumap.Edumap.site_url,
            rss_url: $scope.edumap.Edumap.rss_url,
            foundation_date: $scope.edumap.Edumap.foundation_date,
            closed_date: $scope.edumap.Edumap.closed_date,
            governor_type: $scope.edumap.Edumap.governor_type,
            education_type: $scope.edumap.Edumap.education_type,
            coeducation_type: $scope.edumap.Edumap.coeducation_type,
            principal_name: $scope.edumap.Edumap.principal_name,
            principal_email: $scope.edumap.Edumap.principal_email,
            description: $scope.edumap.Edumap.description,
          },
          EdumapSocialMedium: {
            value: $scope.edumap_social_media.EdumapSocialMedium.value,
          },
          EdumapVisibilityFrameSetting: {
            name: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.name,
            name_kana: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.name_kana,
            handle: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.handle,
            postal_code: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.postal_code,
            prefecture: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.prefecture,
            location: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.location,
            tel: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.tel,
            fax: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.fax,
            emergency_email: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.emergency_email,
            inquiry: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.inquiry,
            site_url: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.site_url,
            foundation_date: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.foundation_date,
            closed_date: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.closed_date,
            rss_url: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.rss_url,
            governor_type: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.governor_type,
            education_type: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.education_type,
            coeducation_type: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.coeducation_type,
            principal_name: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.principal_name,
            principal_email: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.principal_email,
            student_number: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.student_number,
            description: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.description,
            social_media: $scope.edumap_visibility_frame_setting.EdumapVisibilityFrameSetting.social_media,
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
      
      $scope.save_radio_button = function(status) {
        $scope.sending = true;

        $http.get($scope.PLUGIN_EDIT_URL + 'form2/' +
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
              $scope.sendPost2($scope.edit);

            })
            .error(function(data, status) {
                $scope.flash.danger(status + ' ' + data.name);
                $scope.sending = false;
            });
      };
      
      $scope.sendPost2 = function(postParams) {
        $http.post($scope.PLUGIN_EDIT_URL + 'edit2/' + Math.random() + '.json',
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
