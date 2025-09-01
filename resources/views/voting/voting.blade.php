<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Voting dengan Fitur Gemini</title>
    <!-- Memuat Tailwind CSS untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memuat Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Menggunakan font Inter sebagai default */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Style untuk menyembunyikan input file asli */
        .file-input-hidden {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        /* Style kustom untuk placeholder contenteditable */
        [contenteditable]:empty:before {
            content: attr(placeholder);
            color: #9ca3af;
            /* gray-400 */
            pointer-events: none;
            display: block;
        }

        /* Efek glow untuk mode edit */
        .edit-mode-active .candidate-card {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }

        /* Style untuk tombol vote yang dinonaktifkan */
        .vote-disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        .vote-disabled:hover {
            background-color: #9ca3af;
        }

        /* Animasi spinner untuk loading */
        .spinner {
            border: 2px solid rgba(0, 0, 0, 0.1);
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border-left-color: #fff;
            animation: spin 1s ease infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen p-4">

    <div id="app-container" class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-6 md:p-8">

        <!-- Judul Aplikasi -->
        <div class="text-center mb-4">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800">Voting</h1>
            <p class="text-gray-500 mt-2">Pemilihan Ketua Umum Informatics Study Club</p>
        </div>


        <!-- Kontainer Kandidat -->
        <div id="candidates-container" class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-start">

            <!-- Kandidat 1 -->
            <div
                class="candidate-card bg-blue-100/50 p-6 rounded-xl border border-blue-200 text-center flex flex-col items-center transition-shadow duration-300">
                <div class="relative group mb-4">
                    <img id="img-candidate-1" src="{{ asset('photo_profil/arma (1)fix.png') }}" alt="Foto Kandidat 1"
                        class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-md">
                    <label for="file-candidate-1"
                        class="absolute inset-0 flex-col items-center justify-center bg-black bg-opacity-50 text-white text-sm font-semibold rounded-full opacity-0 cursor-pointer transition-opacity duration-300">
                        <span>Ubah Foto</span>
                    </label>
                    <input type="file" id="file-candidate-1" class="file-input-hidden" accept="image/*" disabled>
                </div>
                <h2 id="name-candidate-1" contenteditable="false" placeholder="Edit Nama"
                    class="text-2xl font-bold text-blue-900 mb-2 p-2 rounded-lg outline-none">
                    Arma1 23
                </h2>

                <a href="{{ route('voted', ['nama' => 'arma']) }}">
                    <button id="vote-btn-2"
                        class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 shadow-md hover:shadow-lg mt-auto">
                        Beri Suara
                    </button>
                </a>
            </div>

            <!-- Kandidat 2 -->
            <div
                class="candidate-card bg-blue-100/50 p-6 rounded-xl border border-blue-200 text-center flex flex-col items-center transition-shadow duration-300">
                <div class="relative group mb-4">
                    <img id="img-candidate-2" src="{{ asset('photo_profil/kanip (1)fix.png') }}" alt="Foto Kandidat 2"
                        class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-md">
                    <label for="file-candidate-2"
                        class="absolute inset-0 flex-col items-center justify-center bg-black bg-opacity-50 text-white text-sm font-semibold rounded-full opacity-0 cursor-pointer transition-opacity duration-300">
                        <span>Ubah Foto</span>
                    </label>
                    <input type="file" id="file-candidate-2" class="file-input-hidden" accept="image/*" disabled>
                </div>
                <h2 id="name-candidate-2" contenteditable="false" placeholder="Edit Nama"
                    class="text-2xl font-bold text-blue-900 mb-2 p-2 rounded-lg outline-none">
                    Kanif
                </h2>
                <a href="{{ route('voted', ['nama' => 'kanif']) }}">
                    <button id="vote-btn-2"
                        class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 shadow-md hover:shadow-lg mt-auto">
                        Beri Suara
                    </button>
                </a>
                {{-- <div class="w-full bg-blue-200 rounded-full h-4 mt-5 overflow-hidden">
                    <div id="progress-2" class="bg-blue-500 h-full rounded-full transition-all duration-500 ease-out"
                        style="width: 0%;"></div>
                </div>
                <p id="votes-2" class="text-sm text-gray-700 mt-2 font-medium">0 Suara (0%)</p> --}}
            </div>
        </div>

        <div id="voted-message" class="text-center mt-4 text-green-600 font-semibold hidden">
            Terima kasih, suara Anda telah dicatat!
        </div>

        <!-- Total Pemilih dan Tombol Aksi -->
        {{-- <div class="text-center mt-8 pt-6 border-t border-gray-200 flex flex-col justify-center items-center gap-4">
            <p class="text-xl font-semibold text-gray-800">Total Pemilih: <span id="total-voters">0</span></p>
            <div class="flex flex-wrap justify-center gap-3 mt-2">
                <button id="gemini-speech-btn"
                    class="bg-purple-500 text-white font-medium py-2 px-5 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-4 focus:ring-purple-300 transition-colors duration-300 flex items-center gap-2">
                    <span class="gemini-btn-text">✨ Buat Pidato Kemenangan</span>
                    <div class="spinner hidden"></div>
                </button>
                <button id="share-btn"
                    class="bg-green-500 text-white font-medium py-2 px-5 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 transition-colors duration-300">
                    Bagikan
                </button>
                <button id="reset-btn"
                    class="bg-red-500 text-white font-medium py-2 px-5 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 transition-colors duration-300">
                    Reset
                </button>
            </div>
        </div> --}}

        <!-- Modal untuk Pidato Kemenangan -->
        <div id="speech-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden">
            <div class="bg-white rounded-lg shadow-xl p-6 max-w-lg w-full">
                <h3 id="speech-title" class="text-2xl font-bold text-gray-800 mb-4">Pidato Kemenangan</h3>
                <div id="speech-content" class="text-gray-600 whitespace-pre-wrap max-h-80 overflow-y-auto"></div>
                <button id="close-modal-btn"
                    class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- State Aplikasi ---
            let state = {
                votes1: 0,
                votes2: 0,
                name1: 'Kandidat A',
                name2: 'Kandidat B',
                img1: 'https://placehold.co/150x150/EBF4FF/4A5568?text=Foto',
                img2: 'https://placehold.co/150x150/EBF4FF/4A5568?text=Foto',
                vm1: 'Visi & Misi akan dibuat di sini...',
                vm2: 'Visi & Misi akan dibuat di sini...',
            };
            let isEditMode = false;

            // --- Referensi Elemen DOM ---
            const editModeToggle = document.getElementById('edit-mode-toggle');
            const candidatesContainer = document.getElementById('candidates-container');
            const voteBtn1 = document.getElementById('vote-btn-1');
            const voteBtn2 = document.getElementById('vote-btn-2');
            const resetBtn = document.getElementById('reset-btn');
            const shareBtn = document.getElementById('share-btn');
            const geminiVmBtn1 = document.getElementById('gemini-vm-1');
            const geminiVmBtn2 = document.getElementById('gemini-vm-2');
            const geminiSpeechBtn = document.getElementById('gemini-speech-btn');
            const speechModal = document.getElementById('speech-modal');
            const closeModalBtn = document.getElementById('close-modal-btn');

            // --- Fungsi untuk memanggil Gemini API ---
            /**
             * @param {string} prompt Teks prompt untuk dikirim ke model.
             * @param {HTMLElement} buttonEl Tombol yang memicu panggilan API, untuk menampilkan loading.
             * @returns {Promise<string>} Teks yang dihasilkan oleh model.
             */
            async function generateTextWithGemini(prompt, buttonEl) {
                const apiKey = ""; // Disediakan oleh environment
                const apiUrl =
                    `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;

                const btnTextEl = buttonEl.querySelector('.gemini-btn-text');
                const spinnerEl = buttonEl.querySelector('.spinner');

                // Tampilkan loading
                if (btnTextEl) btnTextEl.classList.add('hidden');
                if (spinnerEl) spinnerEl.classList.remove('hidden');
                buttonEl.disabled = true;

                try {
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            contents: [{
                                parts: [{
                                    text: prompt
                                }]
                            }]
                        })
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const result = await response.json();
                    return result.candidates?.[0]?.content?.parts?.[0]?.text ||
                        "Maaf, terjadi kesalahan saat membuat teks.";
                } catch (error) {
                    console.error("Error calling Gemini API:", error);
                    return "Gagal terhubung dengan AI. Silakan coba lagi.";
                } finally {
                    // Sembunyikan loading
                    if (btnTextEl) btnTextEl.classList.remove('hidden');
                    if (spinnerEl) spinnerEl.classList.add('hidden');
                    buttonEl.disabled = false;
                }
            }

            // --- Fungsi-fungsi Utama Aplikasi ---
            function loadStateFromURL() {
                const params = new URLSearchParams(window.location.search);
                if (params.has('data')) {
                    try {
                        const decodedData = atob(params.get('data'));
                        const urlState = JSON.parse(decodedData);
                        state = {
                            ...state,
                            ...urlState
                        };
                    } catch (e) {
                        console.error("Gagal memuat state dari URL:", e);
                    }
                }
            }

            function updateUI() {
                // Update Nama, Foto, Visi Misi
                document.getElementById('name-candidate-1').textContent = state.name1;
                document.getElementById('name-candidate-2').textContent = state.name2;
                document.getElementById('img-candidate-1').src = state.img1;
                document.getElementById('img-candidate-2').src = state.img2;
                document.getElementById('vm-container-1').textContent = state.vm1;
                document.getElementById('vm-container-2').textContent = state.vm2;

                // Update Suara
                const totalVotes = state.votes1 + state.votes2;
                const p1 = totalVotes === 0 ? 0 : (state.votes1 / totalVotes) * 100;
                const p2 = totalVotes === 0 ? 0 : (state.votes2 / totalVotes) * 100;

                document.getElementById('progress-1').style.width = `${p1}%`;
                document.getElementById('progress-2').style.width = `${p2}%`;
                document.getElementById('votes-1').textContent = `${state.votes1} Suara (${p1.toFixed(1)}%)`;
                document.getElementById('votes-2').textContent = `${state.votes2} Suara (${p2.toFixed(1)}%)`;
                document.getElementById('total-voters').textContent = totalVotes;
            }

            function setEditMode(enabled) {
                isEditMode = enabled;
                candidatesContainer.classList.toggle('edit-mode-active', enabled);

                document.getElementById('name-candidate-1').contentEditable = enabled;
                document.getElementById('name-candidate-2').contentEditable = enabled;
                document.getElementById('file-candidate-1').disabled = !enabled;
                document.getElementById('file-candidate-2').disabled = !enabled;
                document.querySelector('label[for="file-candidate-1"]').style.opacity = enabled ? '1' : '0';
                document.querySelector('label[for="file-candidate-2"]').style.opacity = enabled ? '1' : '0';

                geminiVmBtn1.classList.toggle('hidden', !enabled);
                geminiVmBtn1.classList.toggle('flex', enabled);
                geminiVmBtn2.classList.toggle('hidden', !enabled);
                geminiVmBtn2.classList.toggle('flex', enabled);
            }

            function disableVoting() {
                voteBtn1.disabled = true;
                voteBtn2.disabled = true;
                voteBtn1.classList.add('vote-disabled');
                voteBtn2.classList.add('vote-disabled');
                document.getElementById('voted-message').classList.remove('hidden');
            }

            // --- Event Listeners ---
            editModeToggle.addEventListener('change', (e) => setEditMode(e.target.checked));

            voteBtn1.addEventListener('click', () => {
                state.votes1++;
                localStorage.setItem('hasVoted', 'true');
                disableVoting();
                updateUI();
            });

            voteBtn2.addEventListener('click', () => {
                state.votes2++;
                localStorage.setItem('hasVoted', 'true');
                disableVoting();
                updateUI();
            });

            resetBtn.addEventListener('click', () => {
                if (confirm('Anda yakin ingin mereset semua suara dan mengizinkan voting ulang?')) {
                    localStorage.removeItem('hasVoted');
                    window.location.href = window.location.pathname;
                }
            });

            shareBtn.addEventListener('click', () => {
                // Simpan perubahan nama sebelum berbagi
                state.name1 = document.getElementById('name-candidate-1').textContent;
                state.name2 = document.getElementById('name-candidate-2').textContent;

                const encodedData = btoa(JSON.stringify(state));
                const shareUrl = `${window.location.origin}${window.location.pathname}?data=${encodedData}`;

                navigator.clipboard.writeText(shareUrl).then(() => {
                    alert('Link voting telah disalin!');
                }).catch(err => alert('Gagal menyalin link.'));
            });

            function handleFileSelect(event, key) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        state[key] = e.target.result;
                        updateUI();
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            }
            document.getElementById('file-candidate-1').addEventListener('change', (e) => handleFileSelect(e,
                'img1'));
            document.getElementById('file-candidate-2').addEventListener('change', (e) => handleFileSelect(e,
                'img2'));

            // Event Listener untuk Tombol Gemini
            geminiVmBtn1.addEventListener('click', async () => {
                state.name1 = document.getElementById('name-candidate-1').textContent;
                const prompt =
                    `Buatkan visi dan misi yang singkat, padat, dan inspiratif dalam format poin untuk seorang calon ketua bernama "${state.name1}".`;
                const result = await generateTextWithGemini(prompt, geminiVmBtn1);
                state.vm1 = result;
                updateUI();
            });

            geminiVmBtn2.addEventListener('click', async () => {
                state.name2 = document.getElementById('name-candidate-2').textContent;
                const prompt =
                    `Buatkan visi dan misi yang singkat, padat, dan inspiratif dalam format poin untuk seorang calon ketua bernama "${state.name2}".`;
                const result = await generateTextWithGemini(prompt, geminiVmBtn2);
                state.vm2 = result;
                updateUI();
            });

            geminiSpeechBtn.addEventListener('click', async () => {
                const winner = state.votes1 >= state.votes2 ? state.name1 : state.name2;
                const winnerVotes = Math.max(state.votes1, state.votes2);
                const totalVotes = state.votes1 + state.votes2;

                if (totalVotes === 0) {
                    alert("Belum ada suara yang masuk.");
                    return;
                }

                const prompt =
                    `Buatkan sebuah pidato kemenangan yang hangat dan tulus untuk "${winner}" yang baru saja memenangkan pemilihan dengan total ${winnerVotes} suara dari ${totalVotes} pemilih. Sertakan ucapan terima kasih kepada para pendukung dan ajakan untuk bersatu kembali setelah kompetisi. Buat dalam 2-3 paragraf singkat.`;
                const speech = await generateTextWithGemini(prompt, geminiSpeechBtn);

                document.getElementById('speech-title').textContent =
                    `Pidato Kemenangan untuk ${winner}`;
                document.getElementById('speech-content').textContent = speech;
                speechModal.classList.remove('hidden');
            });

            closeModalBtn.addEventListener('click', () => {
                speechModal.classList.add('hidden');
            });

            // --- Inisialisasi Aplikasi ---
            loadStateFromURL();
            updateUI();
            setEditMode(false);
            if (localStorage.getItem('hasVoted')) {
                disableVoting();
            }
        });
    </script>

</body>

</html>
