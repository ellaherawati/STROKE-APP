from flask import Flask, request, jsonify
from flask_cors import CORS
import joblib
import numpy as np

app = Flask(__name__)
CORS(app)

# Path ke model
MODEL_PATH = 'stroke_model.pkl'
SCALER_PATH = 'stroke_scaler.pkl'

# Load model dan scaler
try:
    print("Loading model...")
    model = joblib.load(MODEL_PATH)
    scaler = joblib.load(SCALER_PATH)
    print("✅ Model loaded successfully!")
except Exception as e:
    print(f"❌ Error loading model: {e}")
    print("Please download model files from Google Colab!")
    model = None
    scaler = None

@app.route('/', methods=['GET'])
def home():
    return jsonify({
        'message': 'Stroke Prediction API',
        'status': 'running',
        'model_loaded': model is not None,
        'endpoints': {
            'GET /': 'API Information',
            'GET /health': 'Health Check',
            'POST /predict': 'Make Prediction'
        }
    })

@app.route('/health', methods=['GET'])
def health():
    return jsonify({
        'status': 'healthy',
        'model_loaded': model is not None,
        'scaler_loaded': scaler is not None
    })

@app.route('/predict', methods=['POST'])
def predict():
    if model is None or scaler is None:
        return jsonify({
            'error': 'Model not loaded. Please download model files first.'
        }), 500
    
    try:
        data = request.json
        print(f"📥 Received data: {data}")
        
        # Ekstrak features dalam urutan yang benar
        features = np.array([[
            int(data['gender']),
            float(data['age']),
            int(data['hypertension']),
            int(data['heart_disease']),
            int(data['ever_married']),
            int(data['work_type']),
            int(data['residence_type']),
            float(data['avg_glucose_level']),
            float(data['bmi']),
            int(data['smoking_status'])
        ]])
        
        print(f"📊 Features: {features}")
        
        # Scale features
        features_scaled = scaler.transform(features)
        
        # Prediksi
        prediction = model.predict(features_scaled)[0]
        probability = model.predict_proba(features_scaled)[0]
        
        result = {
            'success': True,
            'prediction': int(prediction),
            'probability': float(probability[1] * 100),
            'risk': 'High Risk' if prediction == 1 else 'Low Risk',
            'risk_level': 'high' if prediction == 1 else 'low',
            'confidence': {
                'no_stroke': float(probability[0] * 100),
                'stroke': float(probability[1] * 100)
            },
            'interpretation': {
                'prediction_text': 'Pasien berisiko tinggi terkena stroke' if prediction == 1 else 'Pasien berisiko rendah terkena stroke',
                'recommendation': 'Segera konsultasi dengan dokter' if prediction == 1 else 'Tetap jaga pola hidup sehat'
            }
        }
        
        print(f"✅ Prediction result: {result}")
        return jsonify(result)
        
    except KeyError as e:
        return jsonify({'error': f'Missing field: {str(e)}'}), 400
    except ValueError as e:
        return jsonify({'error': f'Invalid data format: {str(e)}'}), 400
    except Exception as e:
        print(f"❌ Error: {str(e)}")
        return jsonify({'error': f'Prediction failed: {str(e)}'}), 500

if __name__ == '__main__':
    print("\n" + "="*70)
    print("🏥  STROKE PREDICTION API")
    print("="*70)
    print(f"📦 Model loaded: {model is not None}")
    print(f"📦 Scaler loaded: {scaler is not None}")
    print(f"\n🌐 API URL: http://localhost:5000")
    print(f"📍 Location: /Applications/XAMPP/xamppfiles/htdocs/stroke-app")
    print("\n⚠️  Press CTRL+C to quit")
    print("="*70 + "\n")
    
    app.run(host='0.0.0.0', port=5002, debug=True)
