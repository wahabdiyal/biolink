
@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
   



<div class="card">
    <div class="card-body">

        <form action="{{url('admin/users',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
             <input type="hidden" name="_method" value="PUT">
             @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    <h2 class="h4">Main</h2>
                    <p class="text-muted">Profile details, status and permissions of the account.</p>
                </div>

                <div class="col">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control form-control-lg" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label>Account Status</label>

                        <select class="form-control form-control-lg" name="is_enabled">
                            <option value="2" <?=($user->active =='0') ? 'selected=""':''?> >Disabled</option>
                            <option value="1"  <?=($user->active =='1') ? 'selected=""':''?> >Active</option>
                             
                        </select>
                    </div>

                    <div class="form-group">
                        <label>User Privileges</label>

                        <select class="form-control form-control-lg" name="type">
                            <option value="1" <?=($user->type =='1') ? 'selected=""':''?> >Admin</option>
                            <option value="0" <?=($user->type =='0') ? 'selected=""':''?> >User</option>
                        </select>

                        <small class="form-text text-muted">Admin users will have the same privileges as you, be careful!</small>
                    </div>
                </div>
            </div>

            <div class="mt-5"></div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <h2 class="h4">Plan</h2>
                    <p class="text-muted">Change and update the plan of the user.</p>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Current Plan</label>

                        <select class="form-control form-control-lg" name="plan_id">
                            <option value="free" <?=($user->plan_id =='free') ? 'selected=""':''?> >Free</option>
                            <option value="trial" <?=($user->plan_id =='trial') ? 'selected=""':''?> >Trial</option>
                            <!-- <option value="custom"  <?=($user->plan =='custom') ? 'selected=""':''?>>Custom</option> -->

                                                    </select>
                    </div>

                    <div class="form-group">
                        <label>Plan Trial Done</label>

                        <select class="form-control form-control-lg" name="plan_trial_done">
                            <option value="1"  <?=($user->plan_trial_done =='1') ? 'selected=""':''?> >Yes</option>
                            <option value="0" <?=($user->plan_trial_done =='0') ? 'selected=""':''?> >No</option>
                        </select>
                    </div>

                    <!-- <div id="plan_expiration_date_container" class="form-group" style="display: none;">
                        <label>Plan Expiration Date</label>
                        <input type="text" class="form-control form-control-lg is-invalid" name="plan_expiration_date" autocomplete="off" value="2020-07-15 11:26:19">
                        <div class="invalid-feedback">
                            Keep in mind, this plan expiration date is in the past. You can still save it like this, though.                        </div>
                    </div>

                    <div id="plan_settings" style="display: none;">
                        <div class="form-group">
                            <label for="projects_limit">Total Projects Limit</label>
                            <input type="number" id="projects_limit" name="projects_limit" min="-1" class="form-control form-control-lg" value="-1">
                            <small class="form-text text-muted">Set -1 for unlimited.</small>
                        </div>

                        <div class="form-group">
                            <label for="biolinks_limit">Total Biolinks Limit</label>
                            <input type="number" id="biolinks_limit" name="biolinks_limit" min="-1" class="form-control form-control-lg" value="-1">
                            <small class="form-text text-muted">The total amount of biolink pages that a user can create. Set -1 for unlimited.</small>
                        </div>

                        <div class="form-group">
                            <label for="links_limit">Total Links Limit</label>
                            <input type="number" id="links_limit" name="links_limit" min="-1" class="form-control form-control-lg" value="-1">
                            <small class="form-text text-muted">The total amount of links that a user can create (shorted links). Set -1 for unlimited.</small>
                        </div>

                        <div class="form-group">
                            <label for="domains_limit">Total Custom Domains Limit</label>
                            <input type="number" id="domains_limit" name="domains_limit" min="-1" class="form-control form-control-lg" value="-1">
                            <small class="form-text text-muted">The total amount of custom domains that a user can add. Set -1 for unlimited.</small>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="additional_global_domains" name="additional_global_domains" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="additional_global_domains">Additional Global Domains</label>
                            <div><small class="form-text text-muted">Enabling this will make all people having this plan be able to use all the additional global domains.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="custom_url" name="custom_url" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="custom_url">Custom back-half</label>
                            <div><small class="form-text text-muted">Enabling this will give the ability to the user to have custom url aliases instead of auto generated ones.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="deep_links" name="deep_links" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="deep_links">Deep links</label>
                            <div><small class="form-text text-muted">Enabling this will give the ability to the user to use deep links to point to specific apps instead of only http and https urls.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="no_ads" name="no_ads" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="no_ads">No Ads</label>
                            <div><small class="form-text text-muted">Enabling this will make all people having this plan to not see any ads.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="removable_branding" name="removable_branding" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="removable_branding">Removable Footer Branding</label>
                            <div><small class="form-text text-muted">This gives the option for people to remove branding from the biolinks footer.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="custom_branding" name="custom_branding" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="custom_branding">Custom Footer Branding</label>
                            <div><small class="form-text text-muted">This gives the option for people to add their custom branding for the biolinks footer.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="custom_colored_links" name="custom_colored_links" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="custom_colored_links">Colored Links</label>
                            <div><small class="form-text text-muted">Gives the user the ability to customize the color of their biolinks links</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="statistics" name="statistics" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="statistics">Advanced Statistics</label>
                            <div><small class="form-text text-muted">Gives the user the ability to check more in depth statistics and select the time frame</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="google_analytics" name="google_analytics" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="google_analytics">Google Analytics</label>
                            <div><small class="form-text text-muted">Gives the user the ability to add Google Analytics on their biolinks pages.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="facebook_pixel" name="facebook_pixel" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="facebook_pixel">Facebook Pixel</label>
                            <div><small class="form-text text-muted">Gives the user the ability to add Facebook Pixel on their biolinks pages.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="custom_backgrounds" name="custom_backgrounds" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="custom_backgrounds">Custom Backgrounds</label>
                            <div><small class="form-text text-muted">Gives the user the ability to add custom backgrounds on their biolinks pages ( colors, gradients and actual images ).</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="verified" name="verified" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="verified">Verified Checkmark</label>
                            <div><small class="form-text text-muted">Gives the user the verified checkmark on all their Biolink pages.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="scheduling" name="scheduling" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="scheduling">Links Scheduling</label>
                            <div><small class="form-text text-muted">Gives the user the ability to schedule links.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="seo" name="seo" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="seo">SEO</label>
                            <div><small class="form-text text-muted">Gives the user the ability to change the Title and Meta Description of Biolink pages.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="utm" name="utm" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="utm">UTM Parameters</label>
                            <div><small class="form-text text-muted">Gives the user the ability to set global UTM parameters for all the links inside of a Biolink page.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="socials" name="socials" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="socials">Socials</label>
                            <div><small class="form-text text-muted">Gives the user the ability to add his social media accounts and be displayed below the biolink links.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="fonts" name="fonts" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="fonts">Fonts</label>
                            <div><small class="form-text text-muted">Gives the user the ability to pick a font of his liking from the list of extra fonts.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="password" name="password" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="password">Password protection</label>
                            <div><small class="form-text text-muted">Gives the user the ability to password protect their links.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="sensitive_content" name="sensitive_content" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="sensitive_content">Sensitive content warning</label>
                            <div><small class="form-text text-muted">Gives the user the ability to enable a sensitive content warning on their links.</small></div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input id="leap_link" name="leap_link" type="checkbox" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="leap_link">Leap link</label>
                            <div><small class="form-text text-muted">Gives the user the ability to temporarily redirect biolink pages to a particular URL.</small></div>
                        </div>

                        <h3 class="h5 mt-4">Enabled Biolink Blocks</h3>
                        <p class="text-muted">Select which biolink page blocks are enabled for usage on this plan.</p>

                        <div class="row">
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_link" name="enabled_biolink_blocks[]" value="link" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_link">Link</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_text" name="enabled_biolink_blocks[]" value="text" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_text">Text</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_image" name="enabled_biolink_blocks[]" value="image" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_image">Image</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_mail" name="enabled_biolink_blocks[]" value="mail" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_mail">Mail signup</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_soundcloud" name="enabled_biolink_blocks[]" value="soundcloud" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_soundcloud">SoundCloud</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_spotify" name="enabled_biolink_blocks[]" value="spotify" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_spotify">Spotify</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_youtube" name="enabled_biolink_blocks[]" value="youtube" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_youtube">YouTube</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_twitch" name="enabled_biolink_blocks[]" value="twitch" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_twitch">Twitch</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_vimeo" name="enabled_biolink_blocks[]" value="vimeo" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_vimeo">Vimeo</label>
                                    </div>
                                </div>
                                                            <div class="col-6 mb-3">
                                    <div class="custom-control custom-switch">
                                        <input id="enabled_biolink_blocks_tiktok" name="enabled_biolink_blocks[]" value="tiktok" type="checkbox" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="enabled_biolink_blocks_tiktok">TikTok</label>
                                    </div>
                                </div>
                                                    </div>
                    </div> -->
                </div>
            </div>

            <div class="mt-5"></div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <h2 class="h4">Change Password</h2>
                    <p class="text-muted">Leave it empty if you don't want to change the user's password!</p>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label>Repeat Password</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-4"></div>

                <div class="col">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop