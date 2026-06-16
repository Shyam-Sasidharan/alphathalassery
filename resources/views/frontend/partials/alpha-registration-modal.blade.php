<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content overflow-hidden rounded-2xl border-none shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <!-- Sidebar Decor -->
                <div class="lg:col-span-4 bg-primary p-12 text-on-primary flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <span class="material-symbols-outlined text-[160px]">edit_note</span>
                    </div>
                    <div class="relative z-10 space-y-6">
                        <img
                            src="{{ asset('front/images/alpha-higher-institute.png') }}"
                            class="max-h-20 max-w-44 object-contain"
                            alt="Alpha Higher Institute of Religious Sciences"
                            data-registration-college-logo
                        >
                        <h2 class="font-display text-4xl font-bold leading-tight" data-registration-college-title>Alpha Higher Institute of Religious Sciences</h2>
                        <p class="font-body text-on-primary-container text-lg opacity-80" data-registration-college-description>Linked with Dharmaram Vidya Kshetram, Bengalauru.</p>
                    </div>
                    <div class="relative z-10 pt-12">
                        <div class="flex items-center gap-4 text-sm font-label tracking-widest uppercase opacity-60">
                            <span class="h-px w-8 bg-on-primary"></span>
                            Alpha Institute
                        </div>
                    </div>
                </div>

                <!-- Form Area -->
                <div class="lg:col-span-8 bg-surface p-8 lg:p-12 max-h-[90vh] overflow-y-auto">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h3 class="font-display text-2xl text-primary font-bold">Online Registration</h3>
                            <p class="text-on-surface-variant text-sm mt-1">
                                <span data-registration-college-label>Alpha Higher Institute of Religious Sciences</span>
                            </p>
                        </div>
                        <button type="button" class="text-on-surface-variant hover:text-error transition-colors" data-dismiss="modal">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    @if(session('success'))
                        <div class="bg-primary-container text-on-primary-container p-4 rounded-lg mb-6 flex items-center gap-3">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-error-container text-on-error-container p-4 rounded-lg mb-6">
                            <ul class="list-disc list-inside text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('register') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        {!! csrf_field() !!}
                        <!-- Course Selection & Medium of Language -->
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                            <div class="space-y-2">
                                <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">College *</label>
                                <select name="college" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required data-registration-college-input>
                                    <option value="ahirs" {{ old('college', 'ahirs') == 'ahirs' ? 'selected' : '' }}>Alpha Higher Institute</option>
                                    <option value="tacrs" {{ old('college') == 'tacrs' ? 'selected' : '' }}>Tely-Alpha Center</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Course Applied For *</label>
                                <select name="course" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                    <option value="">Select Course</option>
                                    @foreach(['ahirs' => 'Alpha Higher Institute of Religious Sciences', 'tacrs' => 'Tely-Alpha Center For Religious Sciences'] as $collegeKey => $collegeLabel)
                                        <optgroup label="{{ $collegeLabel }}" data-registration-college-group="{{ $collegeKey }}">
                                            @php
                                                $courseQuery = \App\Models\Course::orderBy('name');
                                                if (\Illuminate\Support\Facades\Schema::hasColumn('courses', 'college')) {
                                                    $courseQuery->where('college', $collegeKey);
                                                }
                                            @endphp
                                            @foreach($courseQuery->get() as $course)
                                                <option value="{{ $course->name }}" {{ old('course') == $course->name ? 'selected' : '' }}>{{ $course->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Preferred Centre</label>
                                <select name="centre" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                                    <option value="">Select Centre</option>
                                    @foreach(['ahirs' => 'Alpha Higher Institute of Religious Sciences', 'tacrs' => 'Tely-Alpha Center For Religious Sciences'] as $collegeKey => $collegeLabel)
                                        <optgroup label="{{ $collegeLabel }}" data-registration-college-group="{{ $collegeKey }}">
                                            @php
                                                $centerQuery = \App\Models\Center::orderBy('center');
                                                if (\Illuminate\Support\Facades\Schema::hasColumn('centers', 'college')) {
                                                    $centerQuery->where('college', $collegeKey);
                                                }
                                            @endphp
                                            @foreach($centerQuery->get() as $center)
                                                <option value="{{ $center->center }}" {{ old('centre') == $center->center ? 'selected' : '' }}>{{ $center->center }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Medium of Language *</label>
                                <select name="language" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                    <option value="">Select Medium</option>
                                    <option value="Malayalam" {{ old('language') == 'Malayalam' ? 'selected' : '' }}>Malayalam</option>
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                </select>
                            </div>
                        </div>

                        <!-- Personal Details -->
                        <div class="space-y-6">
                            <h4 class="font-display text-lg text-primary font-bold border-b border-outline-variant/20 pb-2">Personal Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2 space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Full Name *</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Gender *</label>
                                    <div class="flex gap-4 pt-3">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="sex" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }} class="text-primary focus:ring-primary" required>
                                            <span class="text-sm">Male</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="sex" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }} class="text-primary focus:ring-primary">
                                            <span class="text-sm">Female</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Date of Birth *</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Nationality *</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Marital Status *</label>
                                    <select name="marital" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                        <option value="">Select</option>
                                        <option value="Single" {{ old('marital') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Religious" {{ old('marital') == 'Religious' ? 'selected' : '' }}>Religious</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Details -->
                        <div class="space-y-6">
                            <h4 class="font-display text-lg text-primary font-bold border-b border-outline-variant/20 pb-2">Contact Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Email Address *</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Phone Number *</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Postal Address *</label>
                                <textarea name="address" rows="3" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <!-- Academic & Ecclesiastical -->
                        <div class="space-y-6">
                            <h4 class="font-display text-lg text-primary font-bold border-b border-outline-variant/20 pb-2">Academic & Professional</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Qualification *</label>
                                    <input type="text" name="qualification" value="{{ old('qualification') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Occupation</label>
                                    <input type="text" name="occupation" value="{{ old('occupation') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Diocese</label>
                                    <input type="text" name="diocese" value="{{ old('diocese') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Parish</label>
                                    <input type="text" name="parish" value="{{ old('parish') }}" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                                </div>
                            </div>
                        </div>

                        <!-- Document Upload -->
                        <div class="space-y-6">
                            <h4 class="font-display text-lg text-primary font-bold border-b border-outline-variant/20 pb-2">Document Uploads</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Passport Photo</label>
                                    <input type="file" name="photo" class="text-xs text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Qualification Cert (PDF)</label>
                                    <input type="file" name="certificate" class="text-xs text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label text-xs font-bold uppercase tracking-wider text-on-surface-variant">Fee Receipt</label>
                                    <input type="file" name="fee" class="text-xs text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                </div>
                            </div>
                        </div>

                        <!-- Verification -->
                        <div class="bg-surface-container-high p-6 rounded-xl flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-white rounded-lg border border-outline-variant/30">
                                    {!! captcha_img() !!}
                                </div>
                                <input type="text" name="captcha" placeholder="Enter Captcha" class="bg-surface border border-outline-variant/30 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all w-32" required>
                            </div>
                            <button type="submit" class="bg-primary text-on-primary px-10 py-4 rounded-xl font-bold shadow-lg shadow-primary/20 hover:shadow-xl hover:-translate-y-1 active:translate-y-0 transition-all">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
