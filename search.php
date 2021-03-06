<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage agrilifeorg
 * @since agrilifeorg 1.0
 */

get_header(); ?>

<div id="wrap">
	<div class="content">
		<div id='cse' style='width: 100%;'>Loading</div>
		<script src='//www.google.com/jsapi' type='text/javascript'></script>
		<script type='text/javascript'>
		google.load('search', '1', {language: 'en', style: google.loader.themes.V2_DEFAULT});
		google.setOnLoadCallback(function() {
		  var customSearchOptions = {};
		  var orderByOptions = {};
		  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
		  customSearchOptions['enableOrderBy'] = true;
		  customSearchOptions['orderByOptions'] = orderByOptions;
		  var customSearchControl =   new google.search.CustomSearchControl('000100048838736456753:ykqhnacn-nc', customSearchOptions);
		  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
		  var options = new google.search.DrawOptions();
		  options.enableSearchResultsOnly();
		  options.setAutoComplete(true);
		  customSearchControl.draw('cse', options);
		  function parseParamsFromUrl() {
		    var params = {};
		    var parts = window.location.search.substr(1).split('&');
		    for (var i = 0; i < parts.length; i++) {
		      var keyValuePair = parts[i].split('=');
		      var key = decodeURIComponent(keyValuePair[0]);
		      params[key] = keyValuePair[1] ?
		          decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
		          keyValuePair[1];
		    }
		    return params;
		  }
		  var urlParams = parseParamsFromUrl();
		  var queryParamName = 's';
		  if (urlParams[queryParamName]) {
		    customSearchControl.execute(urlParams[queryParamName]);
		  }
		}, true);
		</script>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
