<style>

.file-box-content {
    display: flex; /* biar berjejer ke samping */
    gap: 15px;
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; 
    scroll-behavior: smooth;
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.file-box-content::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.file-box-content::-webkit-scrollbar-thumb {
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.file-box-content:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.file-box-content:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.file-box-content:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}

.scroll-x {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: transparent transparent; /* awalnya transparan */
    transition: scrollbar-color 0.3s ease;
}

/* Untuk Chrome, Edge, Safari */
.scroll-x::-webkit-scrollbar {
    height: 8px;
    background-color: transparent; /* awalnya transparan */
    transition: background-color 0.3s ease;
}
.scroll-x::-webkit-scrollbar-thumb {
    background-color: transparent; /* awalnya transparan */
    border-radius: 4px;
}

/* Saat hover baru muncul scrollbar */
.scroll-x:hover {
    scrollbar-color: #bbb #eee; /* Firefox */
}
.scroll-x:hover::-webkit-scrollbar {
    background-color: #eee; /* track */
}
.scroll-x:hover::-webkit-scrollbar-thumb {
    background-color: #bbb; /* thumb */
}

</style>