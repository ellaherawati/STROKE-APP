# 🚀 Panduan Lengkap Menjalankan Sistem Prediksi Stroke

Panduan step-by-step untuk menjalankan aplikasi prediksi risiko stroke berbasis Machine Learning.

---

## 📋 Daftar Isi

1. [Persiapan Awal](#1-persiapan-awal)
2. [Instalasi Software](#2-instalasi-software)
3. [Setup Project](#3-setup-project)
4. [Menjalankan Sistem](#4-menjalankan-sistem)
5. [Testing & Verifikasi](#5-testing--verifikasi)
6. [Troubleshooting](#6-troubleshooting)
7. [Tips & Best Practices](#7-tips--best-practices)

---

## 1. Persiapan Awal

### ✅ Checklist Sebelum Mulai

Pastikan Anda memiliki:

- [ ] Komputer dengan OS: Windows/macOS/Linux
- [ ] Koneksi internet (untuk download dependencies)
- [ ] File project lengkap:
  - [ ] `app.py`
  - [ ] `index.php`
  - [ ] `stroke_model.pkl`
  - [ ] `stroke_scaler.pkl`
- [ ] Minimal 4GB RAM tersedia
- [ ] 500MB ruang disk kosong

---

## 2. Instalasi Software

### A. Install Python 3.7+

#### **Windows:**

1. Download Python dari [python.org/downloads](https://www.python.org/downloads/)
2. Jalankan installer
3. ✅ **PENTING**: Centang **"Add Python to PATH"**
4. Klik "Install Now"
5. Tunggu sampai selesai

**Verifikasi:**
```cmd
python --version
```
Output: `Python 3.x.x`

#### **macOS:**

```bash
# Menggunakan Homebrew (recommended)
brew install python@3.11

# Atau download dari python.org
```

**Verifikasi:**
```bash
python3 --version
```
Output: `Python 3.x.x`

#### **Linux (Ubuntu/Debian):**

```bash
sudo apt update
sudo apt install python3 python3-pip python3-venv
```

---

### B. Install XAMPP

1. Download XAMPP dari [apachefriends.org](https://www.apachefriends.org/download.html)
2. Pilih versi sesuai OS Anda
3. Jalankan installer
4. Install dengan pengaturan default
5. Selesai

**Lokasi Default:**
- **Windows**: `C:\xampp\`
- **macOS**: `/Applications/XAMPP/`
- **Linux**: `/opt/lampp/`

---

## 3. Setup Project

### Step 1: Letakkan File di Folder XAMPP

**Windows:**
```
C:\xampp\htdocs\STROKE-APP\
```

**macOS:**
```
/Applications/XAMPP/xamppfiles/htdocs/STROKE-APP/
```

**Linux:**
```
/opt/lampp/htdocs/STROKE-APP/
```

### Step 2: Struktur Folder yang Benar

```
STROKE-APP/
├── app.py
├── index.php
├── stroke_model.pkl
├── stroke_scaler.pkl
└── README.md (optional)
```

**Verifikasi di Terminal/CMD:**

```bash
# Windows
cd C:\xampp\htdocs\STROKE-APP
dir

# macOS/Linux
cd /Applications/XAMPP/xamppfiles/htdocs/STROKE-APP
ls -la
```

Pastikan semua file ada!

---

### Step 3: Setup Virtual Environment (Recommended)

#### **Kenapa Perlu Virtual Environment?**
- ✅ Isolasi dependencies per project
- ✅ Tidak merusak Python sistem
- ✅ Mudah di-manage
- ✅ Best practice untuk development

#### **Cara Setup:**

**Windows:**
```cmd
# Masuk ke folder project
cd C:\xampp\htdocs\STROKE-APP

# Buat virtual environment
python -m venv venv

# Aktifkan virtual environment
venv\Scripts\activate

# Prompt akan berubah jadi: (venv) C:\xampp\htdocs\STROKE-APP>
```

**macOS/Linux:**
```bash
# Masuk ke folder project
cd /Applications/XAMPP/xamppfiles/htdocs/STROKE-APP

# Buat virtual environment
python3 -m venv venv

# Aktifkan virtual environment
source venv/bin/activate

# Prompt akan berubah jadi: (venv) user@computer STROKE-APP %
```

---

### Step 4: Install Python Dependencies

Dengan virtual environment **AKTIF**, jalankan:

```bash
# Install semua package yang diperlukan
pip install flask flask-cors joblib numpy scikit-learn

# Atau jika ada requirements.txt
pip install -r requirements.txt
```

**Output yang diharapkan:**
```
Collecting flask
  Downloading Flask-3.x.x-py3-none-any.whl
Collecting flask-cors
  Downloading Flask_Cors-4.x.x-py2.py3-none-any.whl
...
Successfully installed flask-3.x.x flask-cors-4.x.x joblib-1.x.x numpy-1.x.x scikit-learn-1.x.x
```

**Verifikasi:**
```bash
pip list
```

Pastikan muncul:
- flask
- flask-cors
- joblib
- numpy
- scikit-learn

---

### Step 5: Fix Scikit-Learn Version (Jika Ada Warning)

Jika muncul warning versi saat running, downgrade scikit-learn:

```bash
pip install scikit-learn==1.6.1
```

---

## 4. Menjalankan Sistem

### 🎯 Workflow Lengkap

```
Terminal/CMD (Backend API) ← Biarkan tetap buka
        ↓
XAMPP Apache (Frontend) ← Start di Control Panel
        ↓
Browser (Access Website) ← http://localhost/STROKE-APP/index.php
```

---

### Step 1: Jalankan Backend API

#### **Terminal/CMD 1: Start Flask API**

**Windows:**
```cmd
# Masuk ke folder project
cd C:\xampp\htdocs\STROKE-APP

# Aktifkan virtual environment
venv\Scripts\activate

# Jalankan API
python app.py
```

**macOS/Linux:**
```bash
# Masuk ke folder project
cd /Applications/XAMPP/xamppfiles/htdocs/STROKE-APP

# Aktifkan virtual environment
source venv/bin/activate

# Jalankan API
python3 app.py
```

#### **✅ Output yang Benar:**

```
Loading model...
✅ Model loaded successfully!

======================================================================
🏥  STROKE PREDICTION API
======================================================================
📦 Model loaded: True
📦 Scaler loaded: True

🌐 API URL: http://localhost:5000
📍 Location: /Applications/XAMPP/xamppfiles/htdocs/STROKE-APP

⚠️  Press CTRL+C to quit
======================================================================

 * Serving Flask app 'app'
 * Debug mode: on
WARNING: This is a development server. Do not use it in a production deployment.
 * Running on all addresses (0.0.0.0)
 * Running on http://127.0.0.1:5002
 * Running on http://192.168.x.x:5002
Press CTRL+C to quit
 * Restarting with stat
 * Debugger is active!
 * Debugger PIN: xxx-xxx-xxx
```

**🚨 JANGAN TUTUP TERMINAL INI!** Biarkan tetap running.

---

### Step 2: Start XAMPP Apache

#### **Cara 1: XAMPP Control Panel GUI**

1. Buka aplikasi **XAMPP Control Panel**
2. Cari baris **Apache**
3. Klik tombol **Start**
4. Tunggu hingga status berubah jadi **hijau/running**
5. Jika muncul popup firewall, klik **Allow**

#### **Cara 2: Command Line (macOS/Linux)**

```bash
# Start Apache
sudo /Applications/XAMPP/xamppfiles/xampp startapache

# Stop Apache (jika perlu)
sudo /Applications/XAMPP/xamppfiles/xampp stopapache
```

#### **✅ Tanda Apache Berhasil:**

- Status Apache di XAMPP Control Panel: **Hijau**
- Port: **80** atau **443** (HTTPS)
- Atau buka browser: `http://localhost` → Muncul XAMPP Dashboard

---

### Step 3: Akses Website di Browser

Buka browser favorit Anda (Chrome/Firefox/Safari/Edge), lalu ketik:

```
http://localhost/STROKE-APP/index.php
```

Atau alternatif:

```
http://127.0.0.1/STROKE-APP/index.php
```

**Jika XAMPP menggunakan port 8080:**

```
http://localhost:8080/STROKE-APP/index.php
```

#### **✅ Tampilan yang Benar:**

- Halaman web muncul dengan gradient purple-pink
- Judul: **"Cek Risiko Stroke"**
- Form input terlihat lengkap
- Tidak ada error di halaman

---

## 5. Testing & Verifikasi

### Test 1: Cek API Health

Buka tab baru di browser, akses:

```
http://localhost:5003/health
```

**Output yang diharapkan:**

```json
{
  "status": "healthy",
  "model_loaded": true,
  "scaler_loaded": true
}
```

✅ Jika muncul JSON di atas, API berjalan dengan baik!

---

### Test 2: Test Prediksi Lengkap

#### **A. Isi Form dengan Data Test**

Gunakan data berikut untuk test:

| Field | Value |
|-------|-------|
| **Nama Lengkap** | Ahmad Testing |
| **Jenis Kelamin** | Laki-laki |
| **Usia** | 67 tahun |
| **Tinggi Badan** | 170 cm |
| **Berat Badan** | 100 kg |
| **Tekanan Darah Tinggi** | Ya |
| **Penyakit Jantung** | Ya |
| **Kadar Gula Darah** | 228 mg/dL |
| **Status Merokok** | Aktif Merokok |
| **Status Pernikahan** | Sudah Menikah |
| **Jenis Pekerjaan** | Pegawai Swasta |
| **Lokasi Tempat Tinggal** | Perkotaan |

#### **B. Klik "Cek Risiko Sekarang"**

Yang harus terjadi:
1. ✅ Button berubah jadi "Menganalisis..." (loading)
2. ✅ BMI otomatis terhitung: **34.6**
3. ✅ Setelah 2-3 detik, hasil muncul

#### **C. Verifikasi Hasil**

Hasil yang muncul harus berisi:

**📊 Data Pasien:**
- Semua data yang diinput tadi

**📈 Hasil Analisis:**
- **Status Risiko**: High Risk atau Low Risk (tergantung model)
- **Probabilitas Stroke**: Angka persentase (0-100%)
- **Tingkat Kepercayaan Model**: 
  - Bar hijau: Tidak Berisiko (%)
  - Bar merah: Berisiko Stroke (%)
- **Interpretasi**: Teks prediksi
- **Rekomendasi**: Saran tindakan

**🔧 Tombol Aksi:**
- ✅ Print Laporan
- ✅ Export PDF
- ✅ Bagikan

#### **D. Cek Terminal API**

Di terminal yang menjalankan `app.py`, harus muncul log:

```
📥 Received data: {'gender': '1', 'age': '67', ...}
📊 Features: [[1. 67. 1. ...]]
✅ Prediction result: {'success': True, 'prediction': 1, ...}
127.0.0.1 - - [09/Jan/2025 14:30:45] "POST /predict HTTP/1.1" 200 -
```

---

### Test 3: Test Export & Print

#### **A. Test Print**

1. Klik tombol **"Print Laporan"**
2. Dialog print browser akan muncul
3. Pilih printer atau "Save as PDF"
4. ✅ Laporan tercetak/tersimpan dengan format rapi

#### **B. Test Export PDF**

1. Klik tombol **"Export PDF"**
2. Tunggu loading "⏳ Membuat PDF..."
3. File PDF otomatis terdownload
4. Nama file: `Laporan_Risiko_Stroke_Ahmad_Testing_2025-01-09.pdf`
5. ✅ Buka file PDF, pastikan isinya lengkap

#### **C. Test Share (Optional)**

1. Klik tombol **"Bagikan"**
2. Jika browser support: popup share muncul
3. Jika tidak: pesan "✅ Hasil telah disalin ke clipboard!"
4. ✅ Paste di aplikasi lain untuk verifikasi

---

### Test 4: Test dengan Data Berbeda

Coba dengan data **low risk**:

| Field | Value |
|-------|-------|
| **Nama Lengkap** | Budi Sehat |
| **Jenis Kelamin** | Laki-laki |
| **Usia** | 30 tahun |
| **Tinggi Badan** | 175 cm |
| **Berat Badan** | 70 kg |
| **Tekanan Darah Tinggi** | Tidak |
| **Penyakit Jantung** | Tidak |
| **Kadar Gula Darah** | 95 mg/dL |
| **Status Merokok** | Tidak Pernah Merokok |
| **Status Pernikahan** | Belum Menikah |
| **Jenis Pekerjaan** | Pegawai Swasta |
| **Lokasi Tempat Tinggal** | Perkotaan |

**Hasil yang diharapkan:** Status Risiko = **Low Risk** (hijau)

---

## 6. Troubleshooting

### ❌ Error 1: "Model not loaded"

**Penyebab:** File `.pkl` tidak ditemukan

**Solusi:**
```bash
# Cek lokasi file
ls -la stroke_model.pkl stroke_scaler.pkl

# Windows
dir stroke_model.pkl stroke_scaler.pkl
```

Pastikan file ada di folder yang sama dengan `app.py`!

---

### ❌ Error 2: "Port 5002 is in use"

**Solusi Quick:**
```bash
# macOS/Linux
lsof -ti:5002 | xargs kill -9

# Windows
netstat -ano | findstr :5002
taskkill /PID [PID] /F
```

**Solusi Permanent:** Ganti port di `app.py` dan `index.php`

---

### ❌ Error 3: "Connection refused" atau CORS

**Penyebab:** API tidak running atau CORS issue

**Solusi:**
1. Pastikan terminal API masih buka dan running
2. Cek browser console (F12) untuk error detail
3. Restart API:
   ```bash
   CTRL+C  # Stop API
   python3 app.py  # Start lagi
   ```

---

### ❌ Error 4: "Page not found" (404)

**Penyebab:** Path folder salah

**Solusi:**
```bash
# Cek struktur folder
ls /Applications/XAMPP/xamppfiles/htdocs/

# Pastikan ada folder STROKE-APP
```

Atau coba URL alternatif:
- `http://localhost/stroke-app/index.php` (lowercase)
- `http://localhost:8080/STROKE-APP/index.php` (port 8080)

---

### ❌ Error 5: Warning Scikit-Learn Version

**Solusi:**
```bash
pip install scikit-learn==1.6.1
```

Lalu restart API.

---

### ❌ Error 6: Apache XAMPP Tidak Start

**Penyebab:** Port 80 sudah digunakan (Skype, IIS, dll)

**Solusi:**

1. **Windows:** Stop aplikasi yang pakai port 80
2. **Atau ubah port Apache:**
   - Buka XAMPP → Config → httpd.conf
   - Cari `Listen 80`, ubah jadi `Listen 8080`
   - Restart Apache
   - Akses: `http://localhost:8080/STROKE-APP/index.php`

---

## 7. Tips & Best Practices

### 📌 Workflow Harian

**Setiap kali mau jalankan aplikasi:**

```bash
# 1. Buka Terminal
cd /Applications/XAMPP/xamppfiles/htdocs/STROKE-APP

# 2. Aktifkan virtual environment
source venv/bin/activate

# 3. Jalankan API
python3 app.py

# 4. Buka XAMPP → Start Apache

# 5. Buka browser → http://localhost/STROKE-APP/index.php
```

**Setelah selesai:**

```bash
# 1. Stop API: CTRL+C di terminal
# 2. Stop Apache di XAMPP
# 3. Deactivate venv: deactivate
```

---

### 🔐 Keamanan

- ✅ Jangan share file `.pkl` ke publik (model Anda)
- ✅ Jangan commit `venv/` ke Git
- ✅ Untuk production: gunakan HTTPS, authentication, rate limiting
- ✅ Validasi semua input dari user

---

### 🚀 Optimasi Performance

**Jika prediksi lambat:**
1. Gunakan model yang lebih kecil
2. Optimize preprocessing
3. Enable caching
4. Deploy ke server dengan resource lebih besar

---

### 📊 Monitoring

**Cek log di Terminal API untuk:**
- Jumlah request
- Error rate
- Response time
- Data input yang dikirim

---

### 🎨 Customization

**Edit tampilan:**
- Buka `index.php`
- Ubah warna gradient di class `gradient-bg`
- Ubah teks di form labels
- Tambah field baru (jangan lupa update `app.py` juga!)

**Edit model:**
- Re-train di Google Colab
- Download `.pkl` baru
- Replace file lama
- Restart API

---

## ✅ Checklist Final

Sebelum menganggap sistem berhasil, pastikan:

- [ ] Python 3.7+ terinstall
- [ ] XAMPP terinstall
- [ ] Virtual environment dibuat dan aktif
- [ ] Dependencies terinstall (flask, flask-cors, dll)
- [ ] File `.pkl` ada di folder project
- [ ] API running di Terminal (port 5002)
- [ ] Apache XAMPP running (hijau)
- [ ] Website bisa diakses di browser
- [ ] Form bisa diisi
- [ ] BMI auto-calculate berfungsi
- [ ] Prediksi berhasil dan muncul hasil
- [ ] Print berfungsi
- [ ] Export PDF berfungsi
- [ ] Tidak ada error di browser console

---

## 🎓 Kesimpulan

Jika semua langkah diikuti dengan benar, sistem Anda akan:

✅ Running dengan sempurna
✅ Memberikan prediksi real-time
✅ Export hasil ke PDF
✅ Print laporan lengkap

**Selamat! Sistem Anda sudah siap digunakan! 🎉**

---

## 📞 Bantuan Lebih Lanjut

Jika masih ada masalah:

1. **Cek dokumentasi lengkap di README.md**
2. **Baca section Troubleshooting**
3. **Cek browser console (F12) untuk error**
4. **Cek terminal API untuk error log**
5. **Screenshot error dan konsultasikan**


Sumber:
Dataset: https://www.kaggle.com/datasets/fedesoriano/stroke-prediction-dataset
Coding google collab: https://youtu.be/YYLIFO-JCnI?si=AtferSot8denOAgK