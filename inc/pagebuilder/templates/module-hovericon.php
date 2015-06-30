<script type="text/template" id="pt-pb-module-hovericon-template">
	<%= partial('pt-pb-module-header-template', { admin_label: admin_label}) %>
	<div class="content-preview hover-icon">
		<a href="#<%= href %>" class="fa fa-<%= size %>x <%= icon %>"></a>

		<h3 class="icon-title"><%= title %></h3>
		<%= content %>
	</div>
</script>