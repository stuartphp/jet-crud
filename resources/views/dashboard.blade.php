<x-app-layout>
    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="#">Login</a></li>
            <li class="divider la la-arrow-right"></li>
            <li>Dashboard</li>
        </ul>
    </section>

    <div class="lg:flex lg:-mx-4">
        <div class="lg:w-1/2 lg:px-4">

            <!-- Summaries -->
            <div class="lg:flex lg:-mx-4">
                <div class="lg:w-1/3 lg:px-4">
                    <div
                        class="card px-4 py-8 text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <span class="text-primary text-5xl leading-none la la-sun"></span>
                        <p class="mt-2">Published Posts</p>
                        <div class="text-primary mt-5 text-3xl leading-none">18</div>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:px-4 pt-5 lg:pt-0">
                    <div
                        class="card px-4 py-8 text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <span class="text-primary text-5xl leading-none la la-cloud"></span>
                        <p class="mt-2">Pending Posts</p>
                        <div class="text-primary mt-5 text-3xl leading-none">16</div>
                    </div>
                </div>
                <div class="lg:w-1/3 lg:px-4 pt-5 lg:pt-0">
                    <div
                        class="card px-4 py-8 text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
                        <span class="text-primary text-5xl leading-none la la-layer-group"></span>
                        <p class="mt-2">Categories</p>
                        <div class="text-primary mt-5 text-3xl leading-none">9</div>
                    </div>
                </div>
            </div>

            <!-- Visitors -->
            <div class="card mt-5 p-5">
                <h3>Visitors</h3>
                <div class="mt-5">
                    <canvas id="visitorsChart"></canvas>
                </div>
            </div>

            <!-- Categories -->
            <div class="card mt-5 p-5">
                <h3>Categories</h3>
                <div class="mt-5">
                    <canvas id="categoriesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="lg:w-1/2 lg:px-4 pt-5 lg:pt-0">

            <!-- Lines -->
            <div class="flex flex-wrap -mx-4">
                <div class="w-1/2 lg:w-1/4 px-4">
                    <div class="card p-5">
                        <h6 class="chart-heading uppercase"></h6>
                        <h4 class="chart-value text-2xl mt-2"></h4>
                        <small class="chart-label uppercase"></small>
                        <canvas id="lineWithAnnotationChart1" class="mt-5"></canvas>
                    </div>
                </div>
                <div class="w-1/2 lg:w-1/4 px-4">
                    <div class="card p-5">
                        <h6 class="chart-heading uppercase"></h6>
                        <h4 class="chart-value text-2xl mt-2"></h4>
                        <small class="chart-label uppercase"></small>
                        <canvas id="lineWithAnnotationChart2" class="mt-5"></canvas>
                    </div>
                </div>
                <div class="w-1/2 lg:w-1/4 px-4 mt-5 lg:mt-0">
                    <div class="card p-5">
                        <h6 class="chart-heading uppercase"></h6>
                        <h4 class="chart-value text-2xl mt-2"></h4>
                        <small class="chart-label uppercase"></small>
                        <canvas id="lineWithAnnotationChart3" class="mt-5"></canvas>
                    </div>
                </div>
                <div class="w-1/2 lg:w-1/4 px-4 mt-5 lg:mt-0">
                    <div class="card p-5">
                        <h6 class="chart-heading uppercase"></h6>
                        <h4 class="chart-value text-2xl mt-2"></h4>
                        <small class="chart-label uppercase"></small>
                        <canvas id="lineWithAnnotationChart4" class="mt-5"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="card mt-5 p-5">
                <h3>Recent Posts</h3>
                <table class="table table_list mt-3 w-full">
                    <thead>
                        <tr>
                            <th class="text-left uppercase">Title</th>
                            <th class="w-px uppercase">Views</th>
                            <th class="w-px uppercase">Pulbished</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                            <td class="text-center">100</td>
                            <td class="text-center">
                                <div class="badge badge_outlined badge_secondary uppercase">Draft</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Donec tempor lacus quis ex ullamcorper, ut cursus dui pellentesque.</td>
                            <td class="text-center">150</td>
                            <td class="text-center">
                                <div class="badge badge_outlined badge_success uppercase">Published</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Quisque molestie velit sed elit finibus, nec gravida nunc finibus.</td>
                            <td class="text-center">300</td>
                            <td class="text-center">
                                <div class="badge badge_outlined badge_warning uppercase">Pending</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Morbi nec nisl ac libero facilisis finibus vitae fringilla dolor.</td>
                            <td class="text-center">120</td>
                            <td class="text-center">
                                <div class="badge badge_outlined badge_success uppercase">Published</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Donec suscipit libero in nibh fringilla hendrerit.</td>
                            <td class="text-center">180</td>
                            <td class="text-center">
                                <div class="badge badge_outlined badge_secondary uppercase">Draft</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn_primary mt-5">Show all Posts</a>
            </div>

            <!-- Quick Post -->
            <div class="card mt-5 p-5">
                <h3>Quick Post</h3>
                <div class="mt-5">
                    <form>
                        <div class="mb-5">
                            <label class="label block mb-2" for="title">Title</label>
                            <input id="title" type="text" class="form-control">
                        </div>
                        <div class="mb-5">
                            <label class="label block mb-2" for="content">Content</label>
                            <textarea id="content" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-5">
                            <label class="label block mb-2" for="category">Category</label>
                            <div class="custom-select">
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Option</option>
                                </select>
                                <div class="custom-select-icon la la-caret-down"></div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button class="btn btn_primary uppercase">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
