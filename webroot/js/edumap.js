/**
 * @fileoverview Edumap Javascript
 * @author nakajimashouhei@gmail.com (Shohei Nakajima)
 */


/**
 * Edumap Javascript
 *
 * @param {string} Controller name
 * @param {function($scope, NetCommonsTab)} Controller
 */
NetCommonsApp.controller('Edumap', function($scope, NetCommonsTab) {

  /**
   * params
   *
   * @type {bool}
   */
  $scope.status = 0;

  /**
   * tab
   *
   * @type {object}
   */
  $scope.tab = NetCommonsTab.new();
});
