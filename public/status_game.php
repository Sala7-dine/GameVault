<div id="update_status_container" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
            <div class="flex items-center">
                <h3 class="text-orange-600 text-3xl font-bold flex-1 text-center w-full">Update the Game's Status</h3>

            </div>

            <form class="space-y-4 mt-8" method="post" autocomplete="off">
                <input type="hidden" name="bib_id_submit" value="<?= $bibo["bib_id"] ?>">


                <div class="flex ">
                    <input type="radio" name="status" value="In progress" />
                    <label class="text-gray-800 text-sm mb-2 block">In progress</label>

                </div>
                <div class="flex ">
                    <input type="radio" name="status" value="Completed" />
                    <label class="text-gray-800 text-sm mb-2 block">Completed</label>

                </div>
                <div class="flex ">
                    <input type="radio" name="status" value="Abandoned" />
                    <label class="text-gray-800 text-sm mb-2 block">Abandoned</label>

                </div>
                <!-- ------------------------------------------submit----------------------------- -->
                <div class="flex justify-end gap-4 !mt-8">

                    <button type="submit" id="ajoutQuizBtn" name="submit_status_update"
                        class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-orange-600 hover:bg-orange-700">Save Changes</button>
                </div>


            </form>
        </div>
    </div>