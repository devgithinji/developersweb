<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use App\MileStone;
use App\Project;
use App\ProjectPhoto;
use App\ProjectProposal;
use App\Quotations;
use App\Service;
use App\ShowCaseProject;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{


    /**
     * ProjectsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index()
    {
        $page_name = 'Projects List';

        $projects = Project::all();

        return view('backend.projects.list', compact('page_name', 'projects'));
    }

    public function create()
    {
        $page_name = 'Projects Create';

        $services = Service::all();
        $clients = User::all();

        return view('backend.projects.create', compact('page_name', 'services', 'clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'client_name' => 'required',
            'service_name' => 'required',
            'quotation' => 'required|numeric',
            'start_date' => 'date|required',
            'finish_date' => 'date|required'
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->client_id = $request->client_name;
        $project->type = $request->service_name;
        $project->quotation = $request->quotation;
        $project->start_date = date('Y-m-d', strtotime($request->start_date));
        $project->description = $request->description;
        $project->status = 0;
        $project->completion_date = date('Y-m-d', strtotime($request->finish_date));
        $project->save();

        $notification = array(
            'message' => 'Project created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('projects.list'))->with($notification);
    }

    public function edit($id)
    {

        $page_name = 'Project Edit';
        $services = Service::all();
        $clients = User::all();
        $project = Project::find($id);
        $milestones = MileStone::where('project_id', $id)->get();
        return view('backend.projects.edit', compact('page_name', 'services', 'clients', 'project', 'milestones'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'client_name' => 'required',
            'service_name' => 'required',
            'quotation' => 'required|numeric',
            'start_date' => 'date|required',
            'finish_date' => 'date|required'
        ]);

        $project = Project::find($id);
        $project->name = $request->name;
        $project->client_id = $request->client_name;
        $project->type = $request->service_name;
        $project->quotation = $request->quotation;
        $project->start_date = date('Y-m-d', strtotime($request->start_date));
        $project->description = $request->description;
        $project->status = 0;
        $project->completion_date = date('Y-m-d', strtotime($request->finish_date));
        $project->save();

        $notification = array(
            'message' => 'Project updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('projects.list'))->with($notification);
    }

    public function view($id)
    {

        $project = Project::find($id);

        return view('backend.projects.view', compact('project'));

    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        $notification = array(
            'message' => 'Project deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CreateMilestone($id)
    {

        $data = [
            'page_name1' => 'Project Milestones Create',
            'page_name2' => Project::find($id)->name,
            'project_id' => $id
        ];

        return view('backend.projects.create_milestone', compact('data'));

    }

    public function StoreMilestone(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'description' => 'required'
        ]);

        $milestone = new MileStone();
        $milestone->name = $request->name;
        $milestone->project_id = $id;
        $milestone->description = $request->description;
        $milestone->status = 0;
        $milestone->progress = '0%';
        $milestone->start_date = date('Y-m-d', strtotime($request->start_date));
        $milestone->completion_date = date('Y-m-d', strtotime($request->finish_date));
        $milestone->save();

        $notification = array(
            'message' => 'Project milestone created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('project.edit', [$id]))->with($notification);
    }

    public function EditMilestone($project_id, $milestone_id)
    {

        $data = [
            'page_name1' => Project::find($project_id)->name,
            'page_name2' => MileStone::find($milestone_id)->name,
        ];

        $milestone = MileStone::find($milestone_id);
        $project = Project::find($project_id);

        $tasks = Task::where('milestone_id', $milestone_id)->get();

        return view('backend.projects.edit_milestone', compact('data', 'milestone', 'project', 'tasks'));
    }

    public function ViewMilestone($project_id, $milestone_id){



        $milestone = MileStone::find($milestone_id);



        return view('backend.projects.view_milestone',compact('milestone'));

    }

    public function UpdateMilestone(Request $request, $project_id, $milestone_id)
    {

        $this->validate($request, [
            'name' => 'string|required',
            'start_date' => 'date|required',
            'finish_date' => 'date|required',
            'description' => 'string|required'
        ]);


        $milestone = MileStone::find($milestone_id);
        $milestone->name = $request->name;
        $milestone->description = $request->description;
        $milestone->start_date = date('Y-m-d', strtotime($request->start_date));
        $milestone->completion_date = date('Y-m-d', strtotime($request->finish_date));

        $milestone->save();

        $notification = array(
            'message' => 'Project milestone updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteMilestone($id)
    {

        $milestone = MileStone::find($id);

        $milestone->delete();

        $notification = array(
            'message' => 'Project milestone deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CreateTask($id)
    {

        $milestone = MileStone::find($id);

        $employees = Employee::all();

        return view('backend.projects.create_task', compact('milestone', 'employees'));
    }

    public function StoreTask(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'developer' => 'required',
            'start_date' => 'date|required',
            'finish_date' => 'date|required',
            'description' => 'string|required'
        ]);


        $project_id = MileStone::find($id)->project->id;

        $task = new Task();
        $task->name = $request->name;
        $task->developer_id = $request->developer;
        $task->milestone_id = $id;
        $task->project_id = $project_id;
        $task->description = $request->description;
        $task->start_date = date('Y-m-d', strtotime($request->start_date));
        $task->completion_date = date('Y-m-d', strtotime($request->finish_date));
        $task->status = 0;

        $task->save();

        $notification = array(
            'message' => 'Milestone task created successfully',
            'alert-type' => 'success'
        );

        $milestone_id = $id;

        return redirect()->to(route('project.milestone.edit', [$project_id, $milestone_id]))->with($notification);
    }

    public function EditTask($id)
    {

        $task = Task::find($id);

        $milestone = MileStone::find($task->milestone_id);

        $employees = Employee::all();

        return view('backend.projects.edit_task', compact('milestone', 'employees', 'task'));
    }

    public function UpdateTask(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'developer' => 'required',
            'start_date' => 'date|required',
            'finish_date' => 'date|required',
            'description' => 'string|required'
        ]);


        $project_id = MileStone::find($id)->project->id;

        $task = Task::find($id);
        $task->name = $request->name;
        $task->developer_id = $request->developer;
        $task->milestone_id = $id;
        $task->project_id = $project_id;
        $task->description = $request->description;
        $task->start_date = date('Y-m-d', strtotime($request->start_date));
        $task->completion_date = date('Y-m-d', strtotime($request->finish_date));
        $task->status = 0;

        $task->save();

        $notification = array(
            'message' => 'Milestone task updated successfully',
            'alert-type' => 'success'
        );

        $milestone_id = $id;

        return redirect()->to(route('project.milestone.edit', [$project_id, $milestone_id]))->with($notification);
    }

    public function DeleteTask($id)
    {

        $task = Task::find($id);

        $task->delete();

        $notification = array(
            'message' => 'Milestone task deleted successfully',
            'alert-type' => 'success'
        );

        $project_id = MileStone::find($id)->project->id;
        $milestone_id = $id;

        return redirect()->to(route('project.milestone.edit', [$project_id, $milestone_id]))->with($notification);
    }

    public function TaskList()
    {
        $tasks = Task::all();

        return view('backend.projects.task_list', compact('tasks'));
    }

    public function ViewTask($id)
    {

        $task = Task::find($id);


        return view('backend.projects.task_details', compact('task'));

    }

    public function showcase(){
        $page_name = 'Projects Showcase List';

        $projects = ShowCaseProject::all();

        return view('backend.projects.showcase_list', compact('page_name', 'projects'));
    }

    public function showcaseCreate(){

        $page_name = 'Projects Create';

        $services = Service::all();

        return view('backend.projects.showcase_create',compact('services','page_name'));
    }

    public function showcaseStore(Request $request){

        $this->validate($request,[
            'name' => 'string',
            'description' => 'required',
            'link' => 'required',
        ]);

        $project = new ShowCaseProject();
        $project->name = $request->name;
        $project->category_id = $request->service_name;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();


        $notification = array(
            'message' => 'Showcase project successfully',
            'alert-type' => 'success'
        );


        return redirect()->to(route('projects.showcase'))->with($notification);

    }

    public function showCaseEdit($id){
        $page_name = 'Projects Create';

        $project = ShowCaseProject::find($id);

        $services = Service::all();

        return view('backend.projects.showcase_edit',compact('services','page_name','project'));
    }

    public function showCaseUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'string',
            'description' => 'required',
            'link' => 'required',
        ]);

        $project = ShowCaseProject::find($id);
        $project->name = $request->name;
        $project->category_id = $request->service_name;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();


        $notification = array(
            'message' => 'Showcase project updated',
            'alert-type' => 'success'
        );


        return redirect()->to(route('projects.showcase'))->with($notification);
    }

    public function showCaseDelete($id){

        $project = ShowCaseProject::find($id);

        $project->delete();

        $notification = array(
            'message' => 'Showcase project deleted',
            'alert-type' => 'success'
        );


        return redirect()->to(route('projects.showcase'))->with($notification);

    }


    public function showcaseAddPhotos($id){

        $project = ShowCaseProject::find($id);

        $page_name = 'Add Photos';

        return view('backend.projects.add_photos',compact('project','page_name'));
    }


    public function showcaseStorePhotos(Request $request,$id){

        $this->validate($request,[
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        if ($request->hasFile('image')){
           foreach ($request->file('image') as $image){
               $extension = $image->getClientOriginalExtension();
               $large_image = 'large_image' . date('H-i-s') . '.' . $extension;
               $small_image = 'small_image' . date('H-i-s') . '.' . $extension;


               Image::make($image)->resize(420, 300)->save(public_path('projectImage/' . $large_image));
               Image::make($image)->resize(330, 206)->save(public_path('projectImage/' . $small_image));

               $photo = new ProjectPhoto();
               $photo->project_id = $id;
               $photo->large_photo = $large_image;
               $photo->small_photo = $small_image;
               $photo->save();
           }

            $notification = array(
                'message' => 'Showcase project photos added successfully',
                'alert-type' => 'success'
            );


            return redirect()->to(route('projects.showcase'))->with($notification);
        }

    }

    public function showcaseViewPhotos($id){

        $project = ShowCaseProject::find($id);

        $photos = ProjectPhoto::where('project_id',$id)->get();

        return view('backend.projects.view_photos',compact('photos','project'));

    }

    public function deleteShoeCasePhotos($id){
        $photo = ProjectPhoto::find($id);
        $photo->delete();

        $notification = array(
            'message' => 'Showcase project photos deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function quotationsList(){
        $quotations = Quotations::all();

        $proposals = ProjectProposal::all();

        return view('backend.projects.quotations',compact('proposals','quotations'));
    }

    public function quotationsStatus($id,$status){

        $quotation = Quotations::find($id);

        if ($quotation->status == 1){
            $notification = array(
                'message' => 'Quotation cannot be un responded ',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


        $quotation->status = $status;
        $quotation->save();

        $notification = array(
            'message' => 'Quotation status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function proposalStatus($id,$status){

        $proposal = ProjectProposal::find($id);
        if ($proposal->status == 1){
            $notification = array(
                'message' => 'Proposal cannot be un responded',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
        $proposal->status = $status;
        $proposal->save();

        $notification = array(
            'message' => 'Proposal status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function quotationView($id){

        $quotation = Quotations::find($id);

        return view('backend.projects.quotation_view',compact('quotation'));

    }

    public function proposalView($id){

        $proposal = ProjectProposal::find($id);

        return view('backend.projects.proposal_view',compact('proposal'));

    }

}
