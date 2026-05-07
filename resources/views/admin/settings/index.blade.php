@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page-title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">

        <!-- General -->
        <div class="col-lg-7">
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-globe me-2"></i>General</h6>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Site Name *</label>
                    <input type="text" name="site_name" class="form-control"
                           value="{{ old('site_name', $settings['site_name'] ?? 'The Way') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Logo</label>
                    @if(!empty($settings['site_logo']))
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($settings['site_logo']) }}"
                                 style="max-height:60px;" alt="Logo"/>
                        </div>
                    @endif
                    <input type="file" name="site_logo" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Footer Copyright Text</label>
                    <input type="text" name="footer_copyright" class="form-control"
                           value="{{ old('footer_copyright', $settings['footer_copyright'] ?? 'Copyright © ' . date('Y')) }}">
                </div>
            </div>

            <!-- Contact Info -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-telephone me-2"></i>Contact Info</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="site_email" class="form-control"
                           value="{{ old('site_email', $settings['site_email'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" name="site_phone" class="form-control"
                           value="{{ old('site_phone', $settings['site_phone'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <input type="text" name="site_address" class="form-control"
                           value="{{ old('site_address', $settings['site_address'] ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Website URL</label>
                    <input type="url" name="site_website" class="form-control"
                           value="{{ old('site_website', $settings['site_website'] ?? '') }}" placeholder="https://">
                </div>
            </div>

            <!-- Social -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-share me-2"></i>Social Links</h6>
                @foreach([
                    ['social_twitter',    'bi-twitter',  'Twitter URL'],
                    ['social_facebook',   'bi-facebook', 'Facebook URL'],
                    ['social_github',     'bi-github',   'GitHub URL'],
                    ['social_googleplus', 'bi-google',   'Google+ URL'],
                ] as [$field, $icon, $label])
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="bi {{ $icon }} me-1"></i>{{ $label }}
                    </label>
                    <input type="url" name="{{ $field }}" class="form-control"
                           value="{{ old($field, $settings[$field] ?? '') }}" placeholder="https://">
                </div>
                @endforeach
            </div>
        </div>

        <!-- Right column -->
        <div class="col-lg-5">
            <!-- Quote section -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-quote me-2"></i>Parallax Quote Section</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Quote Text</label>
                    <textarea name="quote_text" class="form-control" rows="3">{{ old('quote_text', $settings['quote_text'] ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="quote_author" class="form-control"
                           value="{{ old('quote_author', $settings['quote_author'] ?? '') }}" placeholder="Theodore Roosevelt">
                </div>
            </div>

            <!-- CTA -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-megaphone me-2"></i>Call To Action</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">CTA Text</label>
                    <input type="text" name="cta_text" class="form-control"
                           value="{{ old('cta_text', $settings['cta_text'] ?? 'ARE YOU READY TO START A CONVERSATION?') }}">
                </div>
            </div>

            <!-- Fun Facts heading -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-bar-chart me-2"></i>Fun Facts Section</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Section Heading</label>
                    <input type="text" name="facts_heading" class="form-control"
                           value="{{ old('facts_heading', $settings['facts_heading'] ?? 'SOME FUN FACTS') }}">
                </div>
            </div>

            <!-- Parallax Images -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-image me-2"></i>Parallax / Background Images</h6>
                @foreach([
                    ['parallax1_image', 'Quote Section (sep)'],
                    ['parallax2_image', 'Fun Facts Section (sep1)'],
                    ['parallax4_image', 'Testimonials Section (sep2)'],
                    ['parallax3_image', 'Contact Section'],
                ] as [$field, $label])
                <div class="mb-3">
                    <label class="form-label fw-semibold small">{{ $label }}</label>
                    @if(!empty($settings[$field]))
                        <div class="mb-1">
                            <img src="{{ Storage::disk('public')->url($settings[$field]) }}"
                                 style="width:100%;max-height:80px;object-fit:cover;border-radius:4px;" alt=""/>
                        </div>
                    @endif
                    <input type="file" name="{{ $field }}" class="form-control form-control-sm" accept="image/*">
                </div>
                @endforeach
            </div>
        </div>

        <!-- Custom Code -->
        <div class="col-12">
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4"><i class="bi bi-code-slash me-2"></i>Custom Code</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Custom CSS
                            <small class="text-muted fw-normal ms-2">— injected inside &lt;head&gt;</small>
                        </label>
                        <textarea name="custom_css" class="form-control font-monospace" rows="10"
                                  placeholder="/* your CSS here */"
                                  style="font-size:13px;">{{ old('custom_css', $settings['custom_css'] ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Custom JS
                            <small class="text-muted fw-normal ms-2">— injected before &lt;/body&gt;</small>
                        </label>
                        <textarea name="custom_js" class="form-control font-monospace" rows="10"
                                  placeholder="// your JavaScript here"
                                  style="font-size:13px;">{{ old('custom_js', $settings['custom_js'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-check-lg me-1"></i> Save All Settings
            </button>
        </div>
    </div>
</form>
@endsection
