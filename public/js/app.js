function createDepartmentListGroupItem(e){var t=$($("#department-list-group-item-template").html()).insertBefore("#department-list-group-item-add");$(".list-group-item-label",t).html(e.label),$("input",t).val(e.id)}function getDepartmentListGroupValues(){return $('#department-list-group input[type="checkbox"]').map(function(){return $(this).val()}).get()}$(function(){$("form[data-confirm-submit]").on("submit",function(){return confirm($(this).data("confirm-submit"))?void 0:!1})}),$(function(){$("#site-search-input").selectize({valueField:"url",labelField:"label",searchField:["label"],maxOptions:10,options:[],create:!1,render:{option:function(e,t){return"<div>"+t(e.label)+"</div>"}},optgroups:[{value:"employee",label:"Personer"},{value:"department",label:"Avdelningar"}],optgroupField:"type",optgroupOrder:["employee","department"],load:function(e,t){return e.length?void $.ajax({url:root+"/api/search",type:"GET",dataType:"json",data:{q:e},error:function(){t()},success:function(e){var n=getDepartmentListGroupValues();e=_.filter(e,function(e){return console.log(n,e.id),!_.contains(n,String(e.id))}),t(e)}}):t()},onChange:function(){window.location=this.items[0],this.clear(!0)}})}),$(function(){$("#department-list-group").on("change",'input[type="checkbox"]',function(){$(this).closest("li").toggleClass("checked",$(this).prop("checked")).toggleClass("unchecked",!$(this).prop("checked"))}),$("#department-list-group-item-add-input").selectize({valueField:"id",labelField:"label",searchField:["label"],maxOptions:10,options:[],create:!1,render:{option:function(e,t){return"<div>"+t(e.label)+"</div>"}},load:function(e,t){return e.length?void $.ajax({url:root+"/api/search/departments",type:"GET",dataType:"json",data:{q:e},error:function(){t()},success:function(e){var n=getDepartmentListGroupValues();e=_.filter(e,function(e){return console.log(n,e.id),!_.contains(n,String(e.id))}),t(e)}}):t()},onChange:function(){var e=this.items[0],t=this.options[e];createDepartmentListGroupItem(t),this.clear(!0)}})});
//# sourceMappingURL=../maps/app.js.map