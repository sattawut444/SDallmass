{{-- @php
$post = session('admin_menu');
@endphp --}}
<div class="list-group list-group-flush nav nav-pills">
<div class="sidenav" style="width:250px;">
    {{-- @if($post[0]->governance > 0) --}}
        <button class="dropdown-btn dropdown-toggle" style="font-size: 22px">
            <span class="material-symbols-outlined ">
                gavel 
                </span>&nbsp;Governance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
    {{-- @endif --}}
    {{-- @if($post[0]->aniti_bribery_and_corruption > 0) --}}
        <div class="dropdown-container">
            <a href="{{url('/admin/governance/aniti_bribery_and_corruption')}}" style=" background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Aniti-Bribery and<br>&nbsp; &nbsp; &nbsp; &nbsp;Corruption</a>
        </div>
    {{-- @endif --}}
    {{-- @if($post[0]->economic > 0) --}}
        <button class="dropdown-btn dropdown-toggle" style="font-size: 22px">
            <span class="material-symbols-outlined">
                eco
                </span>&nbsp;Economic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
    {{-- @endif --}}
        <div class="dropdown-container dropdown-toggle" id="i" style="border-bottom-style:solid;">
            {{-- @if($post[0]->product_quailty_and_safety > 0) --}}
                <a href="{{url('/admin/economic/product_quailty_and_safety')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Product Quailty and <br>&nbsp; &nbsp; &nbsp; &nbsp;Safety</a>
            {{-- @endif --}}
            {{-- @if($post[0]->sustainable_supply_chain > 0) --}}
                <a href="{{url('/admin/economic/sustainable_supply_chain')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Sustainable Supply<br>&nbsp; &nbsp; &nbsp; &nbsp;Chain</a>
            {{-- @endif --}}
            {{-- @if($post[0]->lnnovation > 0) --}}
                <a href="{{url('/admin/economic/lnnovation')}}" class="menu_lits" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ lnnovation</a>
            {{-- @endif --}}
            {{-- @if($post[0]->tax > 0) --}}
                <a href="{{url('/admin/economic/tax')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Tax</a>
            {{-- @endif --}}
            {{-- @if($post[0]->contribution_to_external_organization_and_associations > 0) --}}
                <a href="{{url('/admin/economic/contribution_to_external_organization_and_associations')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Contributions to<br> &nbsp; &nbsp; &nbsp; &nbsp;External<br>
                &nbsp; &nbsp; &nbsp; &nbsp;Organization<br> &nbsp; &nbsp; &nbsp; &nbsp;and Associations</a>
            {{-- @endif --}}
        </div>
    {{-- @if($post[0]->social > 0) --}}
        <button class="dropdown-btn dropdown-toggle" style="font-size: 22px">
            <span class="material-symbols-outlined">
                connect_without_contact
                </span>&nbsp;Social&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
    {{-- @endif --}}
        <div class="dropdown-container">
            {{-- @if($post[0]->consumer_health > 0) --}}
                <a href="{{url('/admin/social/consumer_health')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Consumer's<br>&nbsp; &nbsp; &nbsp; &nbsp;Health&Well-being</a>
            {{-- @endif --}}
            {{-- @if($post[0]->human_capital > 0) --}}
                <a href="{{url('/admin/social/human_capital')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Human<br>&nbsp; &nbsp; &nbsp; &nbsp;Capital&Labor<br>&nbsp; &nbsp;
                    &nbsp; &nbsp;
                    Practices</a>
            {{-- @endif --}}
            {{-- @if($post[0]->healthy > 0)     --}}
                <a href="{{url('/admin/social/healthy')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Healthy and Safe<br>&nbsp; &nbsp; &nbsp; &nbsp;Work
                    Environment</a>
            {{-- @endif --}}
            {{-- @if($post[0]->citizenship_philanthropy > 0) --}}
                <a href="{{url('/admin/social/citizenship_philanthropy')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Corporate<br>&nbsp; &nbsp; &nbsp;&nbsp; Citizenship &<br>&nbsp; &nbsp;
                    &nbsp; &nbsp;Philanthropy</a>
            {{-- @endif --}}
            {{-- @if($post[0]->human_right > 0) --}}
                <a href="{{url('/admin/social/human_right')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Human Right</a>
            {{-- @endif --}}
            {{-- @if($post[0]->ethical_marketing > 0)     --}}
                <a href="{{url('/admin/social/ethical_marketing')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Ethical Marketing</a>
            {{-- @endif --}}
        </div>
    {{-- @if($post[0]->environment > 0) --}}
        <button class="dropdown-btn dropdown-toggle" style="font-size: 22px">
            <span class="material-symbols-outlined">
                globe_asia
                </span>&nbsp;Environment&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
    {{-- @endif --}}
        <div class="dropdown-container" >
            {{-- @i($post[0]->sustainable_packaging > 0) --}}
                <a href="{{url('/admin/environment/sustainable_packaging')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Sustainable<br>&nbsp; &nbsp; &nbsp; &nbsp;Packaging</a>
            {{-- @endif --}}
            {{-- @if($post[0]->energy_climate > 0)     --}}
                <a href="{{url('/admin/environment/energy_climate')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Energy&Climate</a>
            {{-- @endif --}}
            {{-- @if/($post[0]->water_wastewater > 0) --}}
                <a href="{{url('/admin/environment/water_wastewater')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Water&Wastewater</a>
            {{-- @endif --}}
            {{-- @if($post[0]->waste_manangement > 0) --}}
                <a href="{{url('/admin/environment/waste_manangement')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ Waste<br>&nbsp; &nbsp; &nbsp; &nbsp;Management</a>
            {{-- @endif --}}
        </div>
    {{-- @if($post[0]->policy_document > 0) --}}
        <a href="{{url('/admin/policy_document/policy_document')}}" style="font-size: 20px; margin: auto">
            <span class="material-symbols-outlined">
                policy
                </span>&nbsp;Policy & Document
        </a>
    {{-- @endif --}}
    {{-- @if($post[0]->admin_user > 0) --}}
        <button class="dropdown-btn dropdown-toggle" style="font-size: 22px">
            <span class="material-symbols-outlined">
                group
                </span>&nbsp;ผู้ใช้งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
    {{-- @endif --}}
        <div class="dropdown-container">
            {{-- @if($post[0]->admin_all > 0) --}}
                <a href="{{url('/admin/admin_user')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ ผู้ใช้งานทั้งหมด</a>
            {{-- @endif --}}
            @if($post[0]->admin_group > 0)
                <a href="{{url('/admin/admin_groups')}}" style="background-color: rgba(208, 202, 202, 0.23);  ">&nbsp; &nbsp; ๐ กลุ่มผู้ใช้งาน</a>
            {{-- @endif --}}
        </div>
    </div>
    
</div>
<style>
    a{
     font-size: 16px;
    
    }
    a:hover{
        color: rgb(0, 255, 106)
    }
    .list-group{
        background-color: rgb(7, 28, 85);
        padding-top: 15px; 
    }
    .sidenav{
        background-color: rgb(7, 28, 85);
    }
</style>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>


    