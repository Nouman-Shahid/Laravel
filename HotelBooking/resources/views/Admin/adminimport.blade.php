@extends('layouts.main')
@section('title', 'Admin')
@extends('components.sidebar')

@section('content')
    <div class="flex flex-col w-[82vw] bg-slate-100 h-auto justify-center items-center">
        <div class="container mx-auto p-6 max-w-4xl bg-white shadow-lg rounded-lg w-full">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Import Hotels</h1>

            @if (session('message'))
                <div
                    class="mb-4 p-3 rounded-md {{ session('message_type') == 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ session('message') }}
                </div>
            @endif

            <form id="importForm" action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf
                <div class="mb-6">
                    <label for="file" class="block text-gray-700 mb-2 font-medium">Upload Hotel Data (Excel
                        File)</label>
                    <input type="file" name="file" id="file" accept=".xlsx" class="file-upload-button w-full" />
                </div>
                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    Upload
                </button>
            </form>

            <div id="progressContainer" class="progress-container mt-4">
                <div id="progressBar" class="progress-bar h-4 rounded-md"></div>
                <div id="progressText" class="progress-text mt-2 text-center">0%</div>
            </div>
        </div>
    </div>

    <style>
        .file-upload-button {
            display: block;
            padding: 0.75rem;
            border: 2px solid #ddd;
            border-radius: 0.375rem;
            background-color: #f9fafb;
            color: #4b5563;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
        }

        .file-upload-button:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
        }

        .progress-container {
            display: none;
            margin-top: 1rem;
            width: 100%;
        }

        .progress-bar {
            background-color: #4b5563;
            width: 0;
            transition: width 0.4s;
        }
    </style>

    <script>
        document.getElementById('importForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = event.target;
            var progressContainer = document.getElementById('progressContainer');
            var progressBar = document.getElementById('progressBar');
            var progressText = document.getElementById('progressText');

            // Show progress container
            progressContainer.style.display = 'block';

            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);

            // Set up the progress event
            xhr.upload.onprogress = function(event) {
                if (event.lengthComputable) {
                    var percentComplete = Math.round((event.loaded / event.total) * 100);
                    progressBar.style.width = percentComplete + '%';
                    progressText.textContent = percentComplete + '%';
                }
            };

            // Set up the load event (completed request)
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Handle success
                    progressBar.style.width = '100%';
                    progressText.textContent = 'Upload complete!';
                } else {
                    // Handle error
                    progressBar.style.width = '0%';
                    progressText.textContent = 'Upload failed';
                }
            };

            // Set up the error event
            xhr.onerror = function() {
                progressBar.style.width = '0%';
                progressText.textContent = 'Upload error';
            };

            // Send the form data
            xhr.send(formData);
        });
    </script>
@endsection
