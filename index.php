<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Risiko Stroke</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        input:focus, select:focus {
            transform: scale(1.02);
            transition: all 0.2s;
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Print Styles */
        @media print {
            body {
                background: white !important;
            }
            .no-print {
                display: none !important;
            }
            .print-only {
                display: block !important;
            }
            .glass-effect {
                background: white !important;
                box-shadow: none !important;
            }
        }
        
        .print-only {
            display: none;
        }
    </style>
</head>
<body class="min-h-screen gradient-bg p-4">
    <div class="max-w-5xl mx-auto py-8">
        <!-- Header -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 mb-6 fade-in no-print">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-4 rounded-full">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">
                        Cek Risiko Stroke
                    </h1>
                    <p class="text-gray-600 mt-1">Deteksi dini untuk hidup lebih sehat</p>
                </div>
            </div>
        </div>


        <!-- Form -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 fade-in no-print">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-lg text-lg">1</span>
                Informasi Pribadi
            </h2>
            
            <form id="predictionForm" class="space-y-6">
                <!-- Informasi Dasar -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Nama Lengkap
                        </label>
                        <input type="text" id="fullname" placeholder="Masukkan nama Anda" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select name="gender" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Perempuan</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Lainnya</option>
                        </select>
                    </div>

                    <!-- Age -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Usia</label>
                        <input type="number" name="age" required placeholder="Contoh: 45" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Tinggi Badan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tinggi Badan (cm)</label>
                        <input type="number" id="height" step="0.1" placeholder="Contoh: 170" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Berat Badan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Berat Badan (kg)</label>
                        <input type="number" id="weight" step="0.1" placeholder="Contoh: 70" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>

                    <!-- BMI Display (Auto calculated) -->
                    <div class="col-span-2">
                        <div id="bmiDisplay" class="hidden p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border-2 border-purple-200">
                            <p class="text-sm text-gray-700">BMI Anda: <span id="bmiValue" class="font-bold text-purple-600 text-lg"></span></p>
                            <p class="text-xs text-gray-500 mt-1">Body Mass Index dihitung otomatis dari tinggi dan berat badan</p>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-lg text-lg">2</span>
                    Kondisi Kesehatan
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Hipertensi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Apakah Anda memiliki tekanan darah tinggi?</label>
                        <select name="hypertension" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>

                    <!-- Heart Disease -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Apakah Anda memiliki penyakit jantung?</label>
                        <select name="heart_disease" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>

                    <!-- Glucose Level -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kadar Gula Darah (mg/dL)</label>
                        <input type="number" step="0.01" name="avg_glucose_level" required placeholder="Contoh: 120" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        <p class="text-xs text-gray-500 mt-1">Normal: 70-140 mg/dL (puasa)</p>
                    </div>

                    <!-- Smoking Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Merokok</label>
                        <select name="smoking_status" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="1">Tidak Pernah Merokok</option>
                            <option value="0">Pernah Merokok (Sudah Berhenti)</option>
                            <option value="2">Aktif Merokok</option>
                            <option value="3">Tidak Tahu</option>
                        </select>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-lg text-lg">3</span>
                    Informasi Lainnya
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ever Married -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Pernikahan</label>
                        <select name="ever_married" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Belum Menikah</option>
                            <option value="1">Sudah Menikah / Pernah Menikah</option>
                        </select>
                    </div>

                    <!-- Work Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Pekerjaan</label>
                        <select name="work_type" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Anak-anak / Belum Bekerja</option>
                            <option value="1">Pegawai Negeri / ASN</option>
                            <option value="2">Tidak Bekerja</option>
                            <option value="3">Pegawai Swasta</option>
                            <option value="4">Wiraswasta</option>
                        </select>
                    </div>

                    <!-- Residence Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Tempat Tinggal</label>
                        <select name="residence_type" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih</option>
                            <option value="0">Pedesaan</option>
                            <option value="1">Perkotaan</option>
                        </select>
                    </div>
                </div>

                <!-- Error Message -->
                <div id="errorMessage" class="hidden bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-xl"></div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" id="predictBtn" class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed font-semibold text-lg">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Cek Risiko Sekarang
                        </span>
                    </button>
                    <button type="button" id="resetBtn" class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all font-semibold hover:border-gray-400">
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Prediction Result -->
        <div id="predictionResult" class="hidden mt-8 fade-in">
            <!-- Print/Export Buttons -->
            <div class="glass-effect rounded-2xl shadow-2xl p-6 mb-6 no-print">
                <div class="flex flex-wrap gap-4 justify-center">
                    <button onclick="printReport()" class="flex items-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-3 px-6 rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Laporan
                    </button>
                    <button onclick="exportToPDF()" class="flex items-center gap-2 bg-gradient-to-r from-red-600 to-pink-600 text-white py-3 px-6 rounded-xl hover:from-red-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Export PDF
                    </button>
                    <button onclick="shareResult()" class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-teal-600 text-white py-3 px-6 rounded-xl hover:from-green-700 hover:to-teal-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                        Bagikan
                    </button>
                </div>
            </div>

            <!-- Report Content (Printable) -->
            <div id="reportContent" class="glass-effect rounded-2xl shadow-2xl p-8">
                <!-- Print Header -->
                <div class="print-only text-center mb-8 pb-6 border-b-2 border-gray-300">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-3 rounded-full">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">LAPORAN HASIL PREDIKSI RISIKO STROKE</h1>
                    <p class="text-gray-600">Sistem Deteksi Dini Berbasis Machine Learning</p>
                    <p class="text-sm text-gray-500 mt-2" id="printDate"></p>
                </div>

                <!-- Patient Info -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-lg">📋</span>
                        Data Pasien
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-6 rounded-xl">
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Nama:</span>
                            <span id="printName" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Jenis Kelamin:</span>
                            <span id="printGender" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Usia:</span>
                            <span id="printAge" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">BMI:</span>
                            <span id="printBMI" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Tekanan Darah Tinggi:</span>
                            <span id="printHypertension" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Penyakit Jantung:</span>
                            <span id="printHeartDisease" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Gula Darah:</span>
                            <span id="printGlucose" class="text-gray-900"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="font-semibold text-gray-700">Status Merokok:</span>
                            <span id="printSmoking" class="text-gray-900"></span>
                        </div>
                    </div>
                </div>

                <!-- Main Result -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-lg">📊</span>
                        Hasil Analisis
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-6 bg-white rounded-xl shadow-md border-2 border-gray-200">
                            <p class="text-sm text-gray-600 mb-2">Status Risiko:</p>
                            <p id="riskStatus" class="font-bold text-3xl"></p>
                        </div>
                        
                        <div class="p-6 bg-white rounded-xl shadow-md border-2 border-gray-200">
                            <p class="text-sm text-gray-600 mb-2">Probabilitas Stroke:</p>
                            <p id="probability" class="font-semibold text-2xl text-purple-600"></p>
                        </div>
                    </div>

                    <div class="mt-6 p-6 bg-white rounded-xl shadow-md border-2 border-gray-200">
                        <p class="text-sm font-semibold text-gray-700 mb-3">Tingkat Kepercayaan Model:</p>
                        <div class="space-y-3">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="font-medium">Tidak Berisiko</span>
                                    <span id="noStrokePercent" class="font-bold text-green-600"></span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div id="noStrokeBar" class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-700" style="width: 0%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="font-medium">Berisiko Stroke</span>
                                    <span id="strokePercent" class="font-bold text-red-600"></span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div id="strokeBar" class="bg-gradient-to-r from-red-400 to-red-600 h-3 rounded-full transition-all duration-700" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 p-6 bg-white rounded-xl shadow-md border-2 border-gray-200">
                        <p class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Interpretasi:
                        </p>
                        <p id="interpretationText" class="text-gray-700 mb-3 leading-relaxed"></p>
                        <div class="p-4 bg-purple-50 rounded-lg border-l-4 border-purple-500">
                            <p id="recommendation" class="text-purple-800 font-medium"></p>
                        </div>
                    </div>
                </div>

                <!-- Disclaimer -->
                <div class="mt-6 p-5 bg-yellow-50 rounded-xl border-2 border-yellow-300">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 mb-1">⚠️ Disclaimer Medis</p>
                            <p class="text-sm text-gray-700">
                                Hasil ini adalah prediksi menggunakan teknologi Machine Learning dan <strong>bukan diagnosis medis</strong>. 
                                Untuk pemeriksaan lebih lanjut dan penanganan yang tepat, silakan konsultasi dengan dokter atau tenaga medis profesional.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Print Footer -->
                <div class="print-only mt-8 pt-6 border-t-2 border-gray-300 text-center text-sm text-gray-600">
                    <p><strong>Sistem Prediksi Risiko Stroke</strong></p>
                    <p>Powered by Machine Learning • © 2025</p>
                    <p class="mt-2 text-xs">Dokumen ini dicetak dari sistem prediksi risiko stroke berbasis AI</p>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-6 glass-effect rounded-2xl shadow-xl p-6 fade-in no-print">
            <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Tips Mencegah Stroke
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-gray-700">
                <div class="flex items-start gap-2">
                    <span class="text-green-500 font-bold">✓</span>
                    <span>Rutin berolahraga minimal 30 menit/hari</span>
                </div>
                <div class="flex items-start gap-2">
                    <span class="text-green-500 font-bold">✓</span>
                    <span>Konsumsi makanan sehat dan bergizi seimbang</span>
                </div>
                <div class="flex items-start gap-2">
                    <span class="text-green-500 font-bold">✓</span>
                    <span>Kontrol tekanan darah secara teratur</span>
                </div>
                <div class="flex items-start gap-2">
                    <span class="text-green-500 font-bold">✓</span>
                    <span>Hindari merokok dan konsumsi alkohol</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('predictionForm');
        const predictBtn = document.getElementById('predictBtn');
        const resetBtn = document.getElementById('resetBtn');
        const errorMessage = document.getElementById('errorMessage');
        const predictionResult = document.getElementById('predictionResult');
        const heightInput = document.getElementById('height');
        const weightInput = document.getElementById('weight');
        const bmiDisplay = document.getElementById('bmiDisplay');
        const bmiValue = document.getElementById('bmiValue');
        
        let currentFormData = {};
        let currentResult = {};

        // Calculate BMI automatically
        function calculateBMI() {
            const height = parseFloat(heightInput.value);
            const weight = parseFloat(weightInput.value);
            
            if (height && weight && height > 0 && weight > 0) {
                const heightInMeters = height / 100;
                const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(1);
                bmiValue.textContent = bmi;
                bmiDisplay.classList.remove('hidden');
                return bmi;
            } else {
                bmiDisplay.classList.add('hidden');
                return null;
            }
        }

        heightInput.addEventListener('input', calculateBMI);
        weightInput.addEventListener('input', calculateBMI);

        // Print Report Function
        function printReport() {
            window.print();
        }

        // Export to PDF Function
        async function exportToPDF() {
            // Show loading alert
            const loadingMsg = document.createElement('div');
            loadingMsg.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            loadingMsg.innerHTML = '⏳ Membuat PDF...';
            document.body.appendChild(loadingMsg);
            
            try {
                const element = document.getElementById('reportContent');
                
                // Make sure print elements are visible
                const printElements = element.querySelectorAll('.print-only');
                printElements.forEach(el => el.style.display = 'block');
                
                const opt = {
                    margin: [10, 10, 10, 10],
                    filename: `Laporan_Risiko_Stroke_${currentFormData.fullname || 'Pasien'}_${new Date().toISOString().split('T')[0]}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { 
                        scale: 2, 
                        useCORS: true,
                        logging: true,
                        letterRendering: true,
                        allowTaint: false
                    },
                    jsPDF: { 
                        unit: 'mm', 
                        format: 'a4', 
                        orientation: 'portrait',
                        compress: true
                    },
                    pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
                };
                
                await html2pdf().set(opt).from(element).save();
                
                // Hide print elements again
                printElements.forEach(el => el.style.display = 'none');
                
                loadingMsg.innerHTML = '✅ PDF berhasil diunduh!';
                loadingMsg.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                setTimeout(() => loadingMsg.remove(), 3000);
                
            } catch (err) {
                console.error('Error generating PDF:', err);
                loadingMsg.innerHTML = '❌ Gagal membuat PDF. Coba gunakan tombol Print (Ctrl+P) lalu "Save as PDF"';
                loadingMsg.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                setTimeout(() => loadingMsg.remove(), 5000);
            }
        }

        // Share Result Function
        function shareResult() {
            const shareText = `Hasil Cek Risiko Stroke:\n\nNama: ${currentFormData.fullname || 'Pasien'}\nStatus: ${currentResult.risk}\nProbabilitas: ${currentResult.probability.toFixed(2)}%\n\n${currentResult.interpretation.prediction_text}\n\nLihat detail lengkap di laporan.`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'Hasil Prediksi Risiko Stroke',
                    text: shareText
                }).then(() => {
                    console.log('Berhasil dibagikan');
                }).catch((err) => {
                    console.log('Dibatalkan atau gagal:', err);
                });
            } else {
                // Fallback: Copy to clipboard
                navigator.clipboard.writeText(shareText).then(() => {
                    alert('✅ Hasil telah disalin ke clipboard!\nAnda bisa paste di aplikasi lain.');
                }).catch(() => {
                    alert('❌ Browser tidak mendukung fitur share. Silakan gunakan Print atau Export PDF.');
                });
            }
        }

        // Populate Print Data
        function populatePrintData(formData, result) {
            const genderMap = {'0': 'Perempuan', '1': 'Laki-laki', '2': 'Lainnya'};
            const smokingMap = {'0': 'Pernah Merokok', '1': 'Tidak Pernah', '2': 'Aktif Merokok', '3': 'Tidak Tahu'};
            
            document.getElementById('printDate').textContent = new Date().toLocaleDateString('id-ID', { 
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
            });
            document.getElementById('printName').textContent = formData.fullname || 'Tidak disebutkan';
            document.getElementById('printGender').textContent = genderMap[formData.gender] || '-';
            document.getElementById('printAge').textContent = formData.age + ' tahun';
            document.getElementById('printBMI').textContent = formData.bmi;
            document.getElementById('printHypertension').textContent = formData.hypertension === '1' ? 'Ya' : 'Tidak';
            document.getElementById('printHeartDisease').textContent = formData.heart_disease === '1' ? 'Ya' : 'Tidak';
            document.getElementById('printGlucose').textContent = formData.avg_glucose_level + ' mg/dL';
            document.getElementById('printSmoking').textContent = smokingMap[formData.smoking_status] || '-';
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Reset UI
            errorMessage.classList.add('hidden');
            predictionResult.classList.add('hidden');
            predictBtn.disabled = true;
            predictBtn.innerHTML = '<span class="flex items-center justify-center gap-2"><svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Menganalisis...</span>';

            try {
                const bmi = calculateBMI();
                if (!bmi) {
                    throw new Error('Mohon isi tinggi dan berat badan dengan benar');
                }

                const formData = new FormData(form);
                const data = {};
                formData.forEach((value, key) => {
                    data[key] = value;
                });
                
                // Add extra data
                data.bmi = bmi;
                data.fullname = document.getElementById('fullname').value;
                
                currentFormData = data;

                const response = await fetch('http://localhost:5003/predict', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.error || 'Prediction failed');
                }

                const result = await response.json();
                currentResult = result;
                
                // Display result
                document.getElementById('riskStatus').textContent = result.risk;
                document.getElementById('riskStatus').className = `font-bold text-3xl ${result.risk_level === 'high' ? 'text-red-600' : 'text-green-600'}`;
                document.getElementById('probability').textContent = result.probability.toFixed(2) + '%';
                
                // Confidence bars
                document.getElementById('noStrokePercent').textContent = result.confidence.no_stroke.toFixed(2) + '%';
                document.getElementById('strokePercent').textContent = result.confidence.stroke.toFixed(2) + '%';
                
                setTimeout(() => {
                    document.getElementById('noStrokeBar').style.width = result.confidence.no_stroke + '%';
                    document.getElementById('strokeBar').style.width = result.confidence.stroke + '%';
                }, 100);
                
                // Interpretation
                document.getElementById('interpretationText').textContent = result.interpretation.prediction_text;
                document.getElementById('recommendation').textContent = '💡 ' + result.interpretation.recommendation;
                
                // Populate print data
                populatePrintData(data, result);
                
                predictionResult.classList.remove('hidden');
                predictionResult.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            } catch (error) {
                console.error('Error:', error);
                errorMessage.textContent = '❌ ' + (error.message || 'Gagal melakukan prediksi. Pastikan API berjalan.');
                errorMessage.classList.remove('hidden');
                errorMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } finally {
                predictBtn.disabled = false;
                predictBtn.innerHTML = '<span class="flex items-center justify-center gap-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>Cek Risiko Sekarang</span>';
            }
        });

        resetBtn.addEventListener('click', () => {
            form.reset();
            predictionResult.classList.add('hidden');
            errorMessage.classList.add('hidden');
            bmiDisplay.classList.add('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>