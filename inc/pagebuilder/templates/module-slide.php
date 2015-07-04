<script type="text/template" id="pt-pb-module-slide-template">
	<div title="Drag-and-drop this column into place"
	     class="pt-pb-column-header pt-pb-column-sortable ui-sortable-handle">
		<div class="sortable-background column-sortable-background"></div>
	</div>
	<div class="pt-pb-column-content">
		<%= partial('pt-pb-module-header-template', { admin_label: admin_label, module: 'slide' }) %>
		<div class="slide-content-preview"
		<%= bg_image != '' ? 'style="background-image:url(' + bg_image + ');background-color:' + bg_color + ';"' : void
		0 %>>
		<% if (bg_image == "") { %>
		<div class="slide-dummy-image"><a href="#" title="<?php _e( 'Edit Slide', 'quest' ); ?>"><i
					class="dashicons dashicons-format-image"></i></a></div>
		<% }%>

		<% if (heading == "" && content == "") { %>

		<% }%>

		<% if (heading != "") { %>
		<h2 class="slide-heading" style="<%= heading_color != '' ? 'color:' + heading_color + ';' : void 0  %>">
			<%= heading %></h2>
		<% }%>

		<% if (content != "") { %>
		<div class="slide-text" style="<%= text_color != '' ? 'color:' + text_color + ';' : void 0  %>"><%= content
			%></div>
			<% }%>
	</div>
	</div>
</script>