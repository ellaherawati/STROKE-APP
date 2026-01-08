# 🏥 Stroke Prediction System

Sistem prediksi risiko stroke berbasis Machine Learning menggunakan Flask API dan Web Interface yang modern dan interaktif.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Python](https://img.shields.io/badge/python-3.7+-blue.svg)
![Flask](https://img.shields.io/badge/flask-2.0+-green.svg)

## 📋 Daftar Isi

- [Tentang Aplikasi](#tentang-aplikasi)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Cara Menjalankan](#cara-menjalankan)
- [Cara Penggunaan](#cara-penggunaan)
- [Struktur Project](#struktur-project)
- [API Documentation](#api-documentation)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)

---

## 🎯 Tentang Aplikasi

Aplikasi ini adalah sistem deteksi dini risiko stroke yang menggunakan teknologi Machine Learning. Sistem ini dapat memprediksi risiko stroke berdasarkan data medis dan demografis pasien dengan tingkat akurasi tinggi.

**⚠️ DISCLAIMER**: Hasil prediksi ini **BUKAN diagnosis medis**. Selalu konsultasikan dengan dokter atau tenaga medis profesional untuk pemeriksaan lebih lanjut.

---

## ✨ Fitur Utama

- ✅ **Prediksi Real-time** - Hasil prediksi langsung dengan machine learning
- ✅ **Auto-calculate BMI** - BMI dihitung otomatis dari tinggi dan berat badan
- ✅ **Visualisasi Hasil** - Grafik dan progress bar yang informatif
- ✅ **Export PDF** - Unduh laporan dalam format PDF
- ✅ **Print Report** - Cetak laporan untuk dokumentasi
- ✅ **Share Result** - Bagikan hasil ke aplikasi lain
- ✅ **Responsive Design** - Dapat diakses dari berbagai perangkat
- ✅ **Modern UI/UX** - Interface yang user-friendly dengan animasi smooth

---

## 🛠 Teknologi yang Digunakan

### Backend
- **Python 3.7+** - Programming language
- **Flask** - Web framework untuk API
- **Flask-CORS** - Cross-Origin Resource Sharing
- **Scikit-learn** - Machine learning library
- **Joblib** - Model serialization
- **NumPy** - Numerical computing

### Frontend
- **HTML5** - Structure
- **Tailwind CSS** - Styling framework
- **JavaScript (Vanilla)** - Interactivity
- **html2pdf.js** - PDF generation

### Server
- **XAMPP** - Local development environment (Apache)

---

## 💻 Persyaratan Sistem

### Minimum Requirements:
- **OS**: Windows 7/8/10/11, macOS 10.12+, atau Linux
- **Python**: 3.7 atau lebih tinggi
- **RAM**: 4GB (8GB recommended)
- **Storage**: 500MB free space
- **Browser**: Chrome 90+, Firefox 88+, Safari 14+, Edge 90+

### Software yang Harus Diinstall:
1. Python 3.7+ ([Download](https://www.python.org/downloads/))
2. XAMPP ([Download](https://www.apachefriends.org/download.html))
3. Text Editor/IDE (VSCode, Sublime, dll - optional)

---

## 📦 Instalasi

### Step 1: Clone atau Download Repository

```bash
# Clone repository (jika menggunakan Git)
git clone https://github.com/username/stroke-prediction.git
cd stroke-prediction

# Atau download ZIP dan extract
```

### Step 2: Struktur Folder

Pastikan file-file Anda terorganisir seperti ini:

```
stroke-app/
│
├── app.py                  # Flask API server
├── index.php              # Frontend web interface
├── stroke_model.pkl       # Trained ML model
├── stroke_scaler.pkl      # Feature scaler
├── README.md              # Dokumentasi ini
└── requirements.txt       # Python dependencies (optional)
```

### Step 3: Install Python Dependencies

Buka terminal/command prompt di folder project, lalu jalankan:

```bash
# Install semua dependencies
pip install flask flask-cors joblib numpy scikit-learn

# Atau jika menggunakan Python 3
pip3 install flask flask-cors joblib numpy scikit-learn
```

**Atau menggunakan requirements.txt** (jika ada):

```bash
pip install -r requirements.txt
```

### Step 4: Verifikasi Instalasi

```bash
# Cek versi Python
python --version

# Cek library terinstall
pip list | grep flask
pip list | grep scikit-learn
```

---

## 🚀 Cara Menjalankan

### Metode 1: Manual Start

#### 1. Jalankan Flask API (Terminal/CMD)

```bash
# Navigasi ke folder project
cd /Applications/XAMPP/xamppfiles/htdocs/stroke-app

# Windows
python app.py

# macOS/Linux
python3 app.py
```

**Output yang diharapkan:**

```
======================================================================
🏥  STROKE PREDICTION API
======================================================================
📦 Model loaded: True
📦 Scaler loaded: True

🌐 API URL: http://localhost:5002
📍 Location: /Applications/XAMPP/xamppfiles/htdocs/stroke-app

⚠️  Press CTRL+C to quit
======================================================================

 * Running on http://0.0.0.0:5002
```

✅ **PENTING**: Biarkan terminal ini tetap terbuka!

#### 2. Jalankan XAMPP

1. Buka **XAMPP Control Panel**
2. Klik tombol **Start** pada **Apache**
3. Tunggu hingga Apache berwarna hijau

#### 3. Akses Aplikasi di Browser

```
http://localhost/stroke-app/index.php
```

---

### Metode 2: Quick Start Script (Optional)

**Windows (start.bat):**
```batch
@echo off
start cmd /k python app.py
timeout /t 3
start http://localhost/stroke-app/index.php
```

**macOS/Linux (start.sh):**
```bash
#!/bin/bash
python3 app.py &
sleep 3
open http://localhost/stroke-app/index.php
```

Jalankan dengan double-click atau `./start.sh`

---

## 📖 Cara Penggunaan

### 1. Mengakses Aplikasi

Buka browser dan akses:
```
http://localhost/stroke-app/index.php
```

### 2. Mengisi Form

#### **Bagian 1: Informasi Pribadi**
- **Nama Lengkap**: Nama pasien (optional, untuk laporan)
- **Jenis Kelamin**: Pilih Perempuan/Laki-laki/Lainnya
- **Usia**: Masukkan usia dalam tahun (contoh: 45)
- **Tinggi Badan**: Dalam cm (contoh: 170)
- **Berat Badan**: Dalam kg (contoh: 70)
- **BMI**: Otomatis terhitung

#### **Bagian 2: Kondisi Kesehatan**
- **Tekanan Darah Tinggi**: Ya/Tidak
- **Penyakit Jantung**: Ya/Tidak
- **Kadar Gula Darah**: Dalam mg/dL (normal: 70-140)
- **Status Merokok**: 
  - Tidak Pernah Merokok
  - Pernah Merokok (Sudah Berhenti)
  - Aktif Merokok
  - Tidak Tahu

#### **Bagian 3: Informasi Lainnya**
- **Status Pernikahan**: Belum/Sudah Menikah
- **Jenis Pekerjaan**: Pilih sesuai kategori
- **Lokasi Tempat Tinggal**: Pedesaan/Perkotaan

### 3. Mendapatkan Hasil

1. Klik tombol **"Cek Risiko Sekarang"**
2. Tunggu beberapa detik (loading)
3. Hasil akan muncul di bawah form dengan informasi:
   - **Status Risiko**: High Risk / Low Risk
   - **Probabilitas Stroke**: Dalam persentase
   - **Tingkat Kepercayaan Model**: Bar chart
   - **Interpretasi & Rekomendasi**

### 4. Export/Print Hasil

#### **Print Laporan**
- Klik tombol **"Print Laporan"**
- Atau tekan `Ctrl+P` (Windows) / `Cmd+P` (Mac)
- Pilih printer atau "Save as PDF"

#### **Export PDF**
- Klik tombol **"Export PDF"**
- File PDF akan otomatis terunduh
- Nama file: `Laporan_Risiko_Stroke_[Nama]_[Tanggal].pdf`

#### **Bagikan Hasil**
- Klik tombol **"Bagikan"**
- Pilih aplikasi untuk berbagi
- Atau hasil akan otomatis tersalin ke clipboard

### 5. Reset Form

Klik tombol **"Reset"** untuk mengosongkan form dan memulai prediksi baru.

---

## 📁 Struktur Project

```
stroke-app/
│
├── app.py                      # Flask API Backend
│   ├── /                       # GET - API info
│   ├── /health                 # GET - Health check
│   └── /predict                # POST - Prediction endpoint
│
├── index.php                   # Frontend Interface
│   ├── Form Input              # User input form
│   ├── BMI Calculator          # Auto BMI calculation
│   ├── Result Display          # Prediction results
│   ├── Print Function          # Print report
│   ├── PDF Export              # Export to PDF
│   └── Share Function          # Share results
│
├── stroke_model.pkl            # Trained ML Model (RandomForest/XGBoost/etc)
├── stroke_scaler.pkl           # StandardScaler for feature normalization
│
└── README.md                   # Documentation
```

---

## 🔌 API Documentation

### Base URL
```
http://localhost:5002
```

### Endpoints

#### 1. Get API Information
```http
GET /
```

**Response:**
```json
{
  "message": "Stroke Prediction API",
  "status": "running",
  "model_loaded": true,
  "endpoints": {
    "GET /": "API Information",
    "GET /health": "Health Check",
    "POST /predict": "Make Prediction"
  }
}
```

---

#### 2. Health Check
```http
GET /health
```

**Response:**
```json
{
  "status": "healthy",
  "model_loaded": true,
  "scaler_loaded": true
}
```

---

#### 3. Make Prediction
```http
POST /predict
```

**Request Headers:**
```
Content-Type: application/json
```

**Request Body:**
```json
{
  "gender": 1,                    // 0=Female, 1=Male, 2=Other
  "age": 45,                      // Years
  "hypertension": 1,              // 0=No, 1=Yes
  "heart_disease": 0,             // 0=No, 1=Yes
  "ever_married": 1,              // 0=No, 1=Yes
  "work_type": 3,                 // 0-4 (see mapping below)
  "residence_type": 1,            // 0=Rural, 1=Urban
  "avg_glucose_level": 120.5,    // mg/dL
  "bmi": 28.3,                    // kg/m²
  "smoking_status": 2             // 0-3 (see mapping below)
}
```

**Work Type Mapping:**
- `0`: Children / Unemployed
- `1`: Government Job
- `2`: Never Worked
- `3`: Private Job
- `4`: Self-employed

**Smoking Status Mapping:**
- `0`: Formerly Smoked
- `1`: Never Smoked
- `2`: Smokes
- `3`: Unknown

**Success Response (200 OK):**
```json
{
  "success": true,
  "prediction": 1,
  "probability": 75.32,
  "risk": "High Risk",
  "risk_level": "high",
  "confidence": {
    "no_stroke": 24.68,
    "stroke": 75.32
  },
  "interpretation": {
    "prediction_text": "Pasien berisiko tinggi terkena stroke",
    "recommendation": "Segera konsultasi dengan dokter"
  }
}
```

**Error Response (400 Bad Request):**
```json
{
  "error": "Missing field: age"
}
```

**Error Response (500 Internal Server Error):**
```json
{
  "error": "Model not loaded. Please download model files first."
}
```

---

### Example Usage (JavaScript)

```javascript
const data = {
  gender: 1,
  age: 45,
  hypertension: 1,
  heart_disease: 0,
  ever_married: 1,
  work_type: 3,
  residence_type: 1,
  avg_glucose_level: 120.5,
  bmi: 28.3,
  smoking_status: 2
};

fetch('http://localhost:5002/predict', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(data)
})
.then(response => response.json())
.then(result => {
  console.log('Prediction:', result.prediction);
  console.log('Probability:', result.probability);
  console.log('Risk Level:', result.risk);
})
.catch(error => console.error('Error:', error));
```

---

## 🐛 Troubleshooting

### ❌ Problem 1: "Model not loaded"

**Error Message:**
```
❌ Error loading model: [Errno 2] No such file or directory: 'stroke_model.pkl'
```

**Penyebab**: File model atau scaler tidak ditemukan.

**Solusi**:
```bash
# Cek keberadaan file
ls -la stroke_model.pkl stroke_scaler.pkl

# Windows
dir stroke_model.pkl stroke_scaler.pkl
```

Pastikan file `.pkl` ada di folder yang sama dengan `app.py`.

---

### ❌ Problem 2: "Module not found" / "No module named 'flask'"

**Error Message:**
```
ModuleNotFoundError: No module named 'flask'
```

**Penyebab**: Library Python belum terinstall.

**Solusi**:
```bash
# Upgrade pip terlebih dahulu
pip install --upgrade pip

# Install semua dependencies
pip install flask flask-cors joblib numpy scikit-learn

# Verifikasi
pip list | grep flask
```

---

### ❌ Problem 3: Port Already in Use

**Error Message:**
```
OSError: [Errno 48] Address already in use
```

**Penyebab**: Port 5002 sudah digunakan aplikasi lain.

**Solusi 1 - Ganti Port**:

Edit `app.py` baris terakhir:
```python
app.run(host='0.0.0.0', port=5003, debug=True)  # Ganti ke 5003
```

Lalu update `index.php` di fungsi fetch:
```javascript
const response = await fetch('http://localhost:5003/predict', {
```

**Solusi 2 - Stop Aplikasi yang Menggunakan Port**:

```bash
# macOS/Linux
lsof -i :5002
kill -9 [PID]

# Windows
netstat -ano | findstr :5002
taskkill /PID [PID] /F
```

---

### ❌ Problem 4: CORS Error

**Error Message (di Browser Console)**:
```
Access to fetch at 'http://localhost:5002/predict' from origin 'http://localhost' 
has been blocked by CORS policy
```

**Penyebab**: Flask-CORS tidak terinstall atau tidak aktif.

**Solusi**:
```bash
pip install flask-cors

# Restart Flask API
python app.py
```

---

### ❌ Problem 5: Connection Refused

**Error Message**:
```
Failed to fetch
ERR_CONNECTION_REFUSED
```

**Penyebab**: Flask API belum/tidak berjalan.

**Solusi**:
1. Pastikan terminal yang menjalankan `python app.py` masih terbuka
2. Cek apakah ada error di terminal tersebut
3. Restart Flask API jika perlu
4. Cek firewall tidak memblock port 5002

---

### ❌ Problem 6: BMI Tidak Terhitung

**Penyebab**: Input tinggi/berat badan tidak valid.

**Solusi**:
- Pastikan menggunakan angka (bukan text)
- Gunakan titik (.) bukan koma (,) untuk desimal
- Contoh benar: `170` dan `70.5`
- Contoh salah: `170cm` atau `70,5`

---

### ❌ Problem 7: PDF Export Gagal

**Error Message**:
```
❌ Gagal membuat PDF
```

**Solusi**:
1. Pastikan library `html2pdf.js` terload (cek koneksi internet)
2. Gunakan alternatif: Print → Save as PDF
3. Cek browser console untuk error details

---

### ❌ Problem 8: Apache XAMPP Tidak Bisa Start

**Penyebab**: Port 80 atau 443 sudah digunakan (biasanya oleh Skype, IIS, atau aplikasi lain).

**Solusi**:
1. Buka XAMPP Config → Apache → httpd.conf
2. Ganti port:
   ```
   Listen 8080
   ServerName localhost:8080
   ```
3. Akses aplikasi di: `http://localhost:8080/stroke-app/index.php`

---

## 📊 Model Information

### Features Used (Input)
1. **Gender** - Jenis kelamin (0=Female, 1=Male, 2=Other)
2. **Age** - Usia dalam tahun
3. **Hypertension** - Riwayat hipertensi (0=No, 1=Yes)
4. **Heart Disease** - Riwayat penyakit jantung (0=No, 1=Yes)
5. **Ever Married** - Status pernikahan (0=No, 1=Yes)
6. **Work Type** - Jenis pekerjaan (0-4)
7. **Residence Type** - Tipe tempat tinggal (0=Rural, 1=Urban)
8. **Average Glucose Level** - Kadar gula darah rata-rata (mg/dL)
9. **BMI** - Body Mass Index (kg/m²)
10. **Smoking Status** - Status merokok (0-3)

### Output
- **Prediction**: 0 (No Stroke) atau 1 (Stroke)
- **Probability**: Persentase kemungkinan stroke (0-100%)
- **Risk Level**: "Low Risk" atau "High Risk"

### Model Performance (Example)
- **Accuracy**: ~95%
- **Precision**: ~92%
- **Recall**: ~89%
- **F1-Score**: ~90%

*Note: Metrik ini contoh, sesuaikan dengan model Anda*

---

## 🔒 Security & Privacy

- ✅ Semua prediksi diproses secara lokal
- ✅ Tidak ada data yang dikirim ke server eksternal
- ✅ Data pasien tidak disimpan di database
- ✅ Session-based processing
- ⚠️ Untuk deployment production, tambahkan:
  - HTTPS/SSL
  - Authentication & Authorization
  - Input validation & sanitization
  - Rate limiting
  - Database encryption (jika menyimpan data)

---

## 🚀 Future Improvements

- [ ] Database integration untuk menyimpan riwayat
- [ ] User authentication & management
- [ ] Multi-model ensemble prediction
- [ ] Real-time dashboard analytics
- [ ] Mobile app version (React Native/Flutter)
- [ ] API rate limiting
- [ ] Docker containerization
- [ ] Cloud deployment (AWS/GCP/Azure)
- [ ] Multi-language support
- [ ] Email notification untuk hasil

---

## 🤝 Contributing

Kontribusi sangat diterima! Untuk berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Contribution Guidelines
- Ikuti PEP 8 untuk Python code
- Tambahkan docstring untuk fungsi baru
- Update README jika ada perubahan fitur
- Test sebelum submit PR

---

## 📝 License

Distributed under the MIT License. See `LICENSE` file for more information.

```
MIT License

Copyright (c) 2025 [Your Name]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction...
```

---

## 👨‍💻 Author

**[Your Name]**
- GitHub: [@ellaherawati](https://github.com/ellaherawati)
- Email: ellaherwati05@gmail.com
- LinkedIn: [Ela Herawati](https://www.linkedin.com/in/ela-herawati-27408a326/)

---

## 🙏 Acknowledgments

- Dataset: [Stroke Prediction Dataset](https://www.kaggle.com/datasets/fedesoriano/stroke-prediction-dataset)
- Icons: [Heroicons](https://heroicons.com/)
- CSS Framework: [Tailwind CSS](https://tailwindcss.com/)
- PDF Library: [html2pdf.js](https://github.com/eKoopmans/html2pdf.js)

---

## ⭐ Star This Project

Jika project ini membantu, berikan ⭐ di GitHub!

---

<div align="center">

**Made with ❤️ for better healthcare**

[⬆ Back to Top](#-stroke-prediction-system)

</div>