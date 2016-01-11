var ptPbApp=ptPbApp||{};ptPbApp.Views=ptPbApp.Views||{},function(e,t,$,i,l){"use strict";l.Views.Section=t.View.extend({template:l.template("section"),className:"pt-pb-section grid",id:function(){return this.model.get("id")},$content:null,$reveal:null,$formElms:null,$insertColumns:null,events:{"click .pt-pb-section-toggle":"toggleSection","click .pt-pb-settings-section":"editSection","click .pt-pb-clone-section":"cloneSection","click .pt-pb-remove":"removeSection","click .save-section":"saveSection","click .pt-pb-insert-slider":"insertSlider","click .pt-pb-insert-generic-slider":"insertGenericSlider","click .pt-pb-insert-gallery":"insertGallery","click .pt-pb-insert-column":"insertColumnsDialog","click .insert .column-layouts li":"insertColumns","click .columns .pt-pb-settings-columns":"insertColumnsDialog","click .update .column-layouts li":"updateColumns","pt-pb-clone-row":"cloneRow"},initialize:function(e){this.model.on("remove",this.remove,this)},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$content=this.$(".pt-pb-content"),this.$reveal=this.$(".pt-pb-section-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this.$insertColumns=this.$(".pt-pb-insert-columns").revealBind(),this.renderRows().makeRowsSortable(),this},renderRows:function(){return this.model.get("rows").each(this.renderRow,this),this},renderRow:function(e,t){var i=t&&t.length,n=i?$(t):this.$content,r=$(new l.Views.Row({model:e}).render().el);l.addAndAnimate(r,n,i,100,i)},editSection:function(e){e.preventDefault(),this.$reveal.trigger("reveal:open")},cloneSection:function(e){e.preventDefault(),l.AddSection(i.extend({},this.model.toJSON({rows:!0}),{id:null}),!0)},saveSection:function(e){this.model.set(l.serializeElms(this.$formElms)),this.$el.find(".pt-pb-section-label").text(this.model.get("admin_label")),this.closeReveal()},removeSection:function(t,i){t&&t.preventDefault(),(i||e.confirm(ptPbAppLocalization.remove_module))&&this.model.trigger("destroy",this.model)},toggleSection:function(e){e.preventDefault();var t=$(e.target),i=t.closest(".pt-pb-header"),l=i.siblings(".pt-pb-content-wrap");void 0===l.css("display")||"block"===l.css("display")?l.slideUp(400,function(){i.addClass("close")}):l.slideDown(400,function(){i.removeClass("close")})},insertColumnsDialog:function(e){e.preventDefault(),e.stopPropagation();var t=null!==e.target.className.match(/fa-|edit-columns/)?"update":"insert",i="update"===t?$(e.target).closest(".pt-pb-row").attr("id"):"";this.$insertColumns.data("rowId",i).removeClass("update insert").addClass(t).trigger("reveal:open")},insertColumns:function(e){var t="LI"===e.target.tagName.toUpperCase()?$(e.target):$(e.target).closest("li"),i=t.data("layout").replace(/ /g,"").split(",");this.renderRow(this.model.addRow({type:"columns",columns:i})),this.$insertColumns.trigger("reveal:close")},insertSlider:function(e){e.preventDefault(),this.renderRow(this.model.addRow({type:"slider",slider:{}}))},insertGallery:function(e){e.preventDefault(),this.renderRow(this.model.addRow({type:"gallery",gallery:{}}))},insertGenericSlider:function(e){e.preventDefault();var t=$(e.target).data("genSlider"),i=this.$el.find(".pt-pb-content"),n=this._createRow("generic-slider",t),r=this.model.get("content"),o=new l.Views.Row({model:n});i.append(o.render().el),r.add(o.model),this.model.set("content",r)},updateColumns:function(e){var t="LI"===e.target.tagName.toUpperCase()?$(e.target):$(e.target).closest("li");$("#"+this.$insertColumns.data("rowId")).trigger("update-columns",t.data("layout")),this.$insertColumns.trigger("reveal:close")},_createRow:function(e,t){var i=this._getRowNum(),n=this.model.get("id"),r=new l.RowModel({id:n+"__row__"+i,parent:n,type:e,genSlider:t||""});return this.model.set("rowNum",i),r},cloneRow:function(e,t){e.preventDefault(),this.renderRow(this.model.addRow(t),$(e.target))},makeRowsSortable:function(){var e=this;this.$el.sortable({handle:".pt-pb-row-header",forcePlaceholderSizeType:!0,placeholder:"sortable-placeholder-pt-pb-row",distance:2,tolerance:"pointer",items:".pt-pb-row",cancel:".pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-row-content",start:function(e,t){t.placeholder.css("height",t.item.height()+"px")}})},closeReveal:function(){this.$reveal.trigger("reveal:close")}}),l.Views.Row=t.View.extend({template:l.template("row"),className:"pt-pb-row clearfix",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,$content:null,events:{"click .pt-pb-remove-row":"removeRow","click .pt-pb-settings-row":"editRow","click .save-row":"saveRow","click .pt-pb-settings-slider":"editSlider","click .pt-pb-settings-generic-slider":"editGenericSlider","click .gallery .pt-pb-settings-gallery":"editGallery","click .pt-pb-row-toggle":"toggleRow","update-columns":"updateColumns","click .pt-pb-clone-row":"cloneRow"},initialize:function(e){this.model.on("remove",this.remove,this).on("change:admin_label",this.adminLabel,this).on("content-import",this.render,this)},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$content=this.$(".pt-pb-row-content"),this.$reveal=this.$el.find(".pt-pb-row-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this.renderContent().makeColumnsSortable(),this.model.set("admin_label","Row - "+this.model.get("type")),this},renderContent:function(){var e=this.model.get("content");return this.model.isColumns()?e.each(this.renderColumn,this):this.model.isSlider()?this.renderSlider(e):this.model.isGenericSlider()?this.renderGenericSlider(e):this.model.isGallery()&&this.renderGallery(e),this},renderColumn:function(e){this.$content.append(new l.Views.Column({model:e}).render().el)},renderSlider:function(e){this.$content.append(new l.Views.Slider({model:e}).render().el)},renderGenericSlider:function(e){console.log(new l.Views.GenericSlider({model:e}).render().el),this.$content.append(new l.Views.GenericSlider({model:e}).render().el)},renderGallery:function(e){this.$content.append(new l.Views.Gallery({model:e}).render().el)},adminLabel:function(e,t){this.$(".pt-pb-row-label").text(t)},toggleRow:function(e){e.preventDefault();var t=$(e.target),i=t.closest(".pt-pb-row-header"),l=i.siblings(".pt-pb-row-content");void 0===l.css("display")||"block"===l.css("display")?l.slideUp(400,function(){i.addClass("close")}):l.slideDown(400,function(){i.removeClass("close")})},removeRow:function(t,i){t.preventDefault(),(i||e.confirm(ptPbAppLocalization.remove_module))&&this.model.trigger("destroy",this.model)},editRow:function(e){e.preventDefault(),this.$reveal.trigger("reveal:open")},saveRow:function(e){this.model.set(l.serializeElms(this.$formElms)),this.$reveal.trigger("reveal:close")},cloneRow:function(e){e.preventDefault(),this.$el.trigger("pt-pb-clone-row",this.model.toJSON({content:!0}))},editSlider:function(e){e.preventDefault(),this.$(".pt-pb-slide:first").trigger("edit-slider")},editGenericSlider:function(e){e.preventDefault(),this.$(".pt-pb-generic-slider").trigger("edit-generic-slider")},editGallery:function(e){e.preventDefault(),this.$(".pt-pb-gimage:first").trigger("edit-gallery")},updateColumns:function(t,i){var l=i.replace(/ /g,"").split(","),n=this.model.get("content");n.length>l.length&&!e.confirm(ptPbAppLocalization.resize_columns)||n.length!=l.length&&this.model.updateColumns(l)},_addGenericSlider:function(t,i){var n=this.model.get("content"),r=this.model.get("id"),o=r+"__generic_slider",s=t||new l.GenericSliderModel({}),d=this.$el.find(".pt-pb-row-content");s.set({parent:r,id:o,type:i||t.type}),this.model.set("content",s),d.append(new l.Views.GenericSlider({model:s}).render().el);var a="ptPbApp"+s.get("type").toProperCase()+"Slider";return a in e&&e[a].icon&&this.$el.find(".pt-pb-row-header .pt-pb-settings-generic-slider").html(e[a].icon),s},makeColumnsSortable:function(){this.$el.sortable({handle:".pt-pb-column-sortable",placeholder:"sortable-placeholder pt-pb-column",forcePlaceholderSizeType:!0,distance:5,tolerance:"pointer",items:".pt-pb-column",start:function(e,t){var i=t.item.attr("class").replace(/ ?pt-pb-column ?/,"");t.placeholder.addClass(i).html('<div class="placeholder-inner" style="height:'+t.item.height()+"px;width:"+t.item.width()+'px;"></div>')}})}}),l.Views.Column=t.View.extend({template:l.template("column"),$insertModule:null,$reveal:null,$formElms:null,$content:null,id:function(){return this.model.get("id")},className:function(){return"pt-pb-module-preview pt-pb-column pt-pb-col-"+this.model.get("type")},events:{"click .save-column":"updateColumn","click .pt-pb-settings-column":"editColumn","click .pt-pb-insert-module":"insertModuleDialog","click .column-module":"insertModule"},initialize:function(e){},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$content=this.$el.find(".pt-pb-column-content"),this.$insertModule=this.$(".pt-pb-insert-modules").revealBind(),this.$reveal=this.$(".pt-pb-column-edit-r").revealBind(),this.$formElms=this.$reveal.find(":input"),this.renderModules().makeModulesSortable(),this},renderModules:function(){return this.model.get("modules").each(this.renderModule,this),this},renderModule:function(e){var t=new(l.Views[e.properName()])({model:e});return this.$content.append(t.render().el),t},insertModuleDialog:function(e){e.preventDefault(),e.stopPropagation(),this.$insertModule.trigger("reveal:open")},insertModule:function(e){e.preventDefault();var t=$(e.target).hasClass("column-module")?$(e.target):$(e.target).parent(),i=t.data("module").replace(/ /g,"").toProperCase().replace(/module/,""),l=this.model.addModule({type:i});if(l){var n=this.renderModule(l);this.closeReveal(!0),n.editModule()}},closeReveal:function(e){this.$insertModule.trigger("reveal:close",{immediate:e,openModalBg:!0})},editColumn:function(e){e&&e.preventDefault(),this.$reveal.trigger("reveal:open")},updateColumn:function(e){this.model.set(l.serializeElms(this.$formElms)),this.$reveal.trigger("reveal:close")},makeModulesSortable:function(){this.$el.sortable({handle:".module-controls",placeholder:"sortable-placeholder-module",forcePlaceholderSizeType:!0,distance:5,tolerance:"pointer",items:".pt-pb-module-preview",start:function(e,t){var i=t.item.attr("class").replace(/ ?pt-pb-column ?/,"");t.placeholder.addClass(i).html('<div class="placeholder-inner" style="height:'+t.item.height()+"px;width:"+t.item.width()+'px;"></div>')}})}}),l.Views.Slider=t.View.extend({template:l.template("module-slider"),className:"pt-pb-slide",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,$content:null,events:{"click .save-slider":"updateSlider","edit-slider":"editSlider","click .pt-pb-insert-slide":"insertSlide"},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$content=this.$(".slider-container"),this.$reveal=this.$(".pt-pb-slider-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this.renderSlides().makeSlidesSortable(),this},renderSlides:function(){return this.model.get("slides").each(this.renderSlide,this),this},renderSlide:function(e,t){var i=new l.Views.Slide({model:e}).render().el;return t?void l.scrollTo($(i).hide().appendTo(this.$content).slideDown().offset().top-300):void this.$content.append(i)},makeSlidesSortable:function(){this.$el.find(".slider-container").sortable({handle:".module-controls",forcePlaceholderSizeType:!0,distance:5,tolerance:"pointer",items:".pt-pb-column"})},editSlider:function(e){e&&e.preventDefault(),this.$reveal.trigger("reveal:open")},updateSlider:function(){this.model.set(l.serializeElms(this.$formElms)),this.$reveal.trigger("reveal:close")},insertSlide:function(e){e&&e.preventDefault(),this.renderSlide(this.model.addSlide(),!0)}}),l.Views.Slide=t.View.extend({template:l.template("module-slide"),className:"pt-pb-column pt-pb-col-1-1",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,$content:null,events:{"click .save-slide":"updateSlide","click .edit-module-slide .edit":"editSlide","click .slide-content-preview":"editSlide","click .edit-module-slide .remove":"removeSlide"},initialize:function(){this.model.on("change",this.render,this).on("remove",this.remove,this)},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$reveal=this.$(".pt-pb-slide-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this.$content=this.$reveal.find('input[name="'+this.model.get("pre")+'[content]"]'),this},editSlide:function(e){e&&e.preventDefault(),l.createEditor(this.$content),this.$reveal.trigger("reveal:open")},updateSlide:function(){this.model.set(i.extend({},l.serializeElms(this.$formElms),{content:l.getContent()})),this.$reveal.trigger("reveal:close")},removeSlide:function(t){t.preventDefault(),e.confirm(ptPbAppLocalization.remove_module)&&this.model.trigger("destroy",this.model)}}),l.Views.GenericSlider=t.View.extend({template:l.template("module-generic-slider"),className:"pt-pb-generic-slider",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,events:{"click .save-generic-slider":"updateSlider","edit-generic-slider":"editSlider"},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$reveal=this.$el.find(".pt-pb-generic-slider-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this},editSlider:function(e){e&&e.preventDefault(),this.$reveal.trigger("reveal:open")},updateSlider:function(){this.model.set(l.serializeElms(this.$formElms)),this.$el.find(".generic-slider-container").html("<b>Slider ID : </b>"+this.model.get("slider_id")),this.$reveal.trigger("reveal:close")}}),l.Views.Gallery=t.View.extend({template:l.template("module-gallery"),className:"pt-pb-gimage",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,$content:null,events:{"click .save-gallery":"updateGallery","edit-gallery":"editGallery","click .pt-pb-insert-gimage":"insertImage"},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$content=this.$(".images-container"),this.$reveal=this.$(".pt-pb-gallery-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this.renderImages().makeImagesSortable(),this},renderImages:function(){return this.model.get("images").each(this.renderImage,this),this},renderImage:function(e,t){var i=new l.Views.GImage({model:e}).render().el;return t?void l.scrollTo($(i).hide().appendTo(this.$content).slideDown().offset().top-300):void this.$content.append(i)},makeImagesSortable:function(){this.$el.find(".images-container").sortable({handle:".module-controls",placeholder:"sortable-placeholder pt-pb-gallery-image",forcePlaceholderSizeType:!0,distance:5,tolerance:"pointer",items:".pt-pb-column",start:function(e,t){t.placeholder.css({height:t.item.height()+"px",width:t.item.width()+"px"})}})},editGallery:function(e){e&&e.preventDefault(),this.$reveal.trigger("reveal:open")},updateGallery:function(){this.model.set(l.serializeElms(this.$formElms)),this.$reveal.trigger("reveal:close")},insertImage:function(e){e&&e.preventDefault(),this.renderImage(this.model.addImage(),!0)}}),l.Views.GImage=t.View.extend({template:l.template("module-gimage"),className:"pt-pb-column pt-pb-col-1-4",id:function(){return this.model.get("id")},$reveal:null,$formElms:null,events:{"click .save-gimage":"updateImage","click .edit-module-gimage .edit":"editImage","click .gimage-content-preview":"editImage","click .edit-module-gimage .remove":"removeImage"},initialize:function(){this.model.on("change",this.render,this).on("remove",this.remove,this)},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$reveal=this.$el.find(".pt-pb-gimage-edit").revealBind(),this.$formElms=this.$reveal.find(":input"),this},editImage:function(e){e&&e.preventDefault(),this.$reveal.trigger("reveal:open")},updateImage:function(){this.model.set(l.serializeElms(this.$formElms)),this.$reveal.trigger("reveal:close")},removeImage:function(t){t.preventDefault(),e.confirm(ptPbAppLocalization.remove_module)&&this.model.trigger("destroy",this.model)}}),l.Views.Module=t.View.extend({$reveal:null,$formElms:null,$content:null,id:function(){return this.model.get("id")},className:"pt-pb-module-preview",events:{"click .content-preview":"editModule","click .edit-module .edit":"editModule","click .save-module":"updateModule","click .edit-module .remove":"removeModule"},initialize:function(){this.model.on("remove",this.remove,this),this.model.on("change",this.render,this)},render:function(e){return this.$el.html(this.template(this.model.toJSON())),this.$reveal=this.$(".reveal-modal").revealBind(),this.$formElms=this.$reveal.find(":input"),this.$content=this.$reveal.find('input[name="'+this.model.get("pre")+'[content]"]'),this},editModule:function(e){e&&e.preventDefault(),l.createEditor(this.$content),this.$reveal.trigger("reveal:open")},updateModule:function(e){var t=l.serializeElms(this.$formElms);this.$content.length>0&&(t.content=l.getContent()),this.model.set(t),this.$reveal.trigger("reveal:close")},removeModule:function(t){t.preventDefault(),e.confirm(ptPbAppLocalization.remove_module)&&this.model.trigger("destroy",this.model,this.model.collection)}}),l.Views.ImageModule=l.Views.Module.extend({template:l.template("module-image")}),l.Views.TextModule=l.Views.Module.extend({template:l.template("module-text")}),l.Views.HovericonModule=l.Views.Module.extend({template:l.template("module-hovericon")}),l.Views.FeatureboxModule=l.Views.Module.extend({template:l.template("module-featurebox")})}(window,Backbone,jQuery,_,ptPbApp);