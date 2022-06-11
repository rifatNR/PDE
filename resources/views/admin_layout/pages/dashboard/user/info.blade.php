@extends('admin_layout.layout.admin_master')

@section('content')

<style>
  .content-header {
    display: contents !important;
  }
</style>

<div id="user" class="container profile" style="">
  <div class="row">
    <div class="col text-center mt-3">
      @if($user->profile->pro_image)
        <img alt="picture" class="rounded-circle border shadow user_image" src="{{ asset('profile_image'. '/' . $user->profile->pro_image) }}"/>
      @else
        <img alt="picture" class="rounded-circle border shadow user_image" src="{{ asset('images/no-pic.png') }}"/>
      @endif
      <h2 class="mt-3 text-capitalize">{{$user->name}}</h2>
    </div>
  </div>

  <div class="row mt-2 justify-content-center">
    <div class="card p-3 w-100">
      <table class="table table-hover table-bordered table-sm table-properties" style="vertical-align: center;">
              <tr>
                <th>Name:</th>
                <td class="text-capitalize">{{ $user->name }}</td>
                <td></td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>{{ $user->email }} <small class="ml-3 badge @if($user->email_verified_at) badge-success @else badge-danger @endif">@if($user->email_verified_at) Verified @else Not Verified @endif</small></td>
                <td></td>
              </tr>
              <tr>
                  <th>Mobile Number:</th>
                  <td>{{ $user->phone }}</td>
                  <td></td>
                </tr>
              <tr>
                <th>Company Name:</th>
                <td>{{ $user->company }}</td>
                <td></td>
              </tr>
              <tr>
                <th>Address:</th>
                <td>{{ $user->profile->address }}</td>
                <td></td>
              </tr>
              <tr>
                <th>City:</th>
                <td>{{ $user->profile->city }}</td>
                <td></td>
              </tr>
              <tr>
                <th>State:</th>
                <td>{{ $user->profile->state }}</td>
                <td></td>
              </tr>
              <tr>
                <th>Country:</th>
                <td>{{ $user->country }}</td>
                <td></td>
              </tr>
              <tr>
                <th>Zip:</th>
                <td>{{ $user->profile->zip_code }}</td>
                <td></td>
              </tr>
              <tr>
                <th>Gift Amount:</th>
                <td>
                  @if($user->profile->gift == null || $user->profile->gift == 0)
                    0 $
                  @else
                    {{ $user->profile->gift }} $
                    <button class="btn btn-sm ml-4 btn-info" data-toggle="modal" data-target="#giftModalInfo">
                      <i class="fas fa-info-circle"></i>
                    </button>
                  @endif
                </td>
                @if($user->profile->is_gifted == 0)
                <td>
                  <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#userGiftModal">Registration Gift</button>
                </td>
                @endif
              </tr>
              <tr>
                <th>
                  Referrer Name:
                </th>
                <td>
                  <p class="text-nowrap" style="margin-bottom: 0px !important;">
                    @if($user->referrer)
                      <a href="{{ route('admin.user.info', ['id'=>$user->referrer->id]) }}">{{$user->referrer->name}}</a>
                    @else
                      No referrer found!!!
                    @endif
                  </p>
                </td>
                <td></td>
              </tr>
              <tr>
                <th>
                  Referrals:
                </th>
                <td>
                  <p class="text-nowrap" style="margin-bottom: 0px !important;">
                    @foreach($user->referrals as $ref)
                      <a href="{{ route('admin.user.info', ['id'=>$ref->id]) }}">{{$ref->name}}, </a>
                    @endforeach
                  </p>
                </td>
                <td></td>
              </tr>
              <tr style="border-bottom: 1px solid #DEE2E6 !important; padding: 0px 0px 5px 0px;">
                <th>Referral Bonus:</th>
                <td>
                  @if($user->ref_gift == null)
                    0 $
                  @else
                    {{$user->ref_gift}} $
                  @endif
                </td>
                <td>
                  @if($user->ref_gift != null)
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#transfer_ref_bonus" onclick="trans({{$user->id}})">Transfer</button>
                  @endif
                </td>
              </tr>
      </table>
    </div>
  </div>
</div>

@include('admin_layout.pages.dashboard.user.add_gift_modal')
@include('admin_layout.pages.dashboard.user.info_modal')
@include('admin_layout.pages.dashboard.user.transfer_modal')

@endsection

@section('script')
<script>
  trans = (id) => {
    console.log(id);
    $(r_id).val(id);
  }
</script>
@endsection