import * as Yup from 'yup';

// Step 1: Applicant Details Validation Schema
export const applicantSchema = Yup.object({
  name: Yup.string().required('Name is required'),
  its: Yup.string().required('ITS is required'),
  age: Yup.number().required('Age is required').positive('Age must be a positive number').integer('Age must be an integer'),
  mauzeJamiat: Yup.string().required('Mauze & Jamiat is required'),
  contactNumber: Yup.string().required('Contact Number is required').matches(/^\d{10}$/, 'Contact Number must be 10 digits'),
  email: Yup.string().email('Invalid email format').required('Email ID is required'),
  fullResidentialAddress: Yup.string().required('Full Residential Address is required'),
  presentOccupationAndWorkAddress: Yup.string().required('Present Occupation and Address of Place of Work is required'),
  otherRelevantInfo: Yup.string().notRequired(),
});

// Step 2: Family Detail Validation Schema
export const familySchema = Yup.object({
  familyMembers: Yup.array().of(
    Yup.object({
      name: Yup.string().required('Name is required'),
      age: Yup.number().required('Age is required').positive('Age must be a positive number').integer('Age must be an integer'),
      relation: Yup.string().required('Relation is required'),
      education: Yup.string().required('Education is required'),
      occupation: Yup.string().required('Occupation is required'),
      income: Yup.number().required('Income is required').positive('Income must be a positive number'),
    })
  ),
  presentFamilyWellbeing: Yup.object({
    food: Yup.string().required('Food status is required'),
    housing: Yup.string().required('Housing status is required'),
    education: Yup.string().required('Education status is required'),
    health: Yup.string().required('Health status is required'),
    deeni: Yup.string().required('Deeni status is required'),
  }),
  presentHouseholdIncome: Yup.number().required('Household income is required').positive('Income must be a positive number'),
});

// Step 3: Counsellor’s Assessment Validation Schema
export const counsellorSchema = Yup.object({
  assessment: Yup.object({
    strengths: Yup.string().required('Strengths are required'),
    weaknesses: Yup.string().required('Weaknesses are required'),
    opportunities: Yup.string().required('Opportunities are required'),
  }),
  recommendations: Yup.object({
    businessOpportunities: Yup.string().required('Business opportunities are required'),
    competitiveness: Yup.string().required('Competitiveness is required'),
    customerAcquisition: Yup.string().required('Customer acquisition is required'),
  }),
});

// Step 4: Economic Upliftment Plan Validation Schema
export const upliftmentSchema = Yup.object({
  actionPlan: Yup.string().required('Action plan is required'),
  assistanceNeeded: Yup.string().required('Assistance needed is required'),
  timeline: Yup.string().required('Timeline is required'),
});

// Step 5: Outcome and Declaration Validation Schema
export const declarationSchema = Yup.object({
  agreeToDeclaration: Yup.boolean().oneOf([true], 'You must agree to the declaration').required('Declaration agreement is required'),
  confirmation: Yup.string().required('Confirmation of correctness is required'),
});

// Step 6: Attachments Validation Schema
export const attachmentSchema = Yup.object({
  attachments: Yup.array().of(Yup.mixed().required('File is required')).min(1, 'At least one file must be uploaded'),
});
